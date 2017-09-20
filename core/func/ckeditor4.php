<?php

    /**
     * Обработка текста перед сохранением. Действия:
     *
     * 1) Преобразовать все внешние img ссылки во внутренние (соответственно скопировав все изображения на сервер)
     * 2) Удалить лишний мусор, который добавляет CKEditor (например при проверке грамматики).
     *
     * @author GYL
     */
    function CKEditor4PreSave($text, $uploadImgs = true, &$uncopiedImgs = array(), $serverName = NULL) 
    {
        global $g_config;

        // когда включена проверка орфографии ckeditor добавляет в html много мусора (лишние спаны). Эта штука его убирает.
        $text = preg_replace('/<span data-scayt_word="[^"]+" data-scaytid="[0-9]*">([^<]+)<\/span>/', '$1', $text);
        $text = preg_replace('/<span data-scaytid="[0-9]*" data-scayt_word="[^"]+">([^<]+)<\/span>/', '$1', $text);

        if (empty($serverName) && isset($_SERVER['SERVER_NAME'])) // на всякий случай преобразуем все ссылки вида http://наш_сайт/img/1.png в /img/1.png
        {
            $serverName = $_SERVER['SERVER_NAME'];
        }
        else
        {
            trigger_error("Invalid server name", E_USER_ERROR);
        }
        
        require_once BASEPATH . 'lib/simple_html_dom.php';
                                               
        $html = str_get_html($text);

        if ($html == NULL) return "";

        foreach ($html->find("img") as $img)
        {
            $img->removeAttribute("data-cke-saved-src");

            $src    = $img->src;
            $alt    = $img->alt;
            $style  = $img->style;

            $parsed = parse_url($src);
            $params = array();

            if (isset($parsed['query']))
            {
                foreach (explode('&', $parsed['query']) as $elem)
                {
                    if (strpos($elem, '=') !== false)
                    {
                        $elem = explode('=', $elem);
                        $params[$elem[0]] = isset($elem[1]) ? $elem[1] : NULL;
                    }
                }
            }
            $isLocal = empty($parsed["host"]) || (!empty($parsed["host"]) && $parsed["host"] == $serverName); // если нет имени сервера или оно равно имени нашего сервера
                            
            if ($isLocal && strpos($parsed["path"], "/upl/" . $g_config['ckeditor4']['upl_dir'] . "/") === 0) // http://oursite.ru/upl/ckeditor_files/abc.jpg -> /upl/ckeditor_files/abc.jpg
            {
                $src = "/upl/" . $g_config['ckeditor4']['upl_dir'] . "/" . basename($src);
            }
            else if ($isLocal && !empty($params["file"]) && strpos($parsed["path"], "/dev/ckeditor_preview/") === 0) // http://oursite.ru/dev/ckeditor_preview?file=abc.jpg -> /upl/ckeditor_files/abc.jpg
            {
                $src = "/upl/" . $g_config['ckeditor4']['upl_dir'] . "/" . $params["file"];
            }
            else if ($isLocal && !empty($params["file"]) && strpos($params["path"], "dev/ckeditor_preview") === 0) // http://oursite.ru/?q=dev/ckeditor_preview?file=abc.jpg -> /upl/ckeditor_files/abc.jpg
            {
                $src = "/upl/" . $g_config['ckeditor4']['upl_dir'] . "/" . $params["file"];
            }
            else if ($uploadImgs && pathinfo($src, PATHINFO_EXTENSION) == "webp" && !function_exists("imagecreatefromwebp")) // small hack
            {
                // do nothing
            }
            else if ($uploadImgs && (strpos($src, "http://") === 0 || strpos($src, "https://") === 0)) // Копируем себе файл с внешней ссылки
            {
                $info = @getimagesize($src);
                $ext  = @image_type_to_extension($info[2], false);
                if (empty($ext)) $ext = @pathinfo(@basename($src), PATHINFO_EXTENSION);
                
                if (!empty($ext))
                {
                    $ext  = strtolower($ext);
                    $name = md5(uniqid(mt_rand())) . "." . $ext;
                    $path = BASEPATH . 'upl/' . $g_config['ckeditor4']['upl_dir'] . '/' . $name;
                    FileSys::MakeDir(BASEPATH . 'upl/' . $g_config['ckeditor4']['upl_dir'] . '/');

                    if (@copy($src, $path))
                    {
                        // Уменьшаем размер файла путем ресайза картинки
                        $wImg = WideImage::load($path);
                        $wImg->resizeDown($g_config['ckeditor4']['resize_down_width'], 
                                          $g_config['ckeditor4']['resize_down_height'])->saveToFile($path);
                       
                        $src = '/upl/' . $g_config['ckeditor4']['upl_dir'] . '/' . $name;
                    }
                    else
                    {
                        $uncopiedImgs[] = $src;
                    }
                }
                else
                {
                    $uncopiedImgs[] = $src;
                }
            }
            
            $img->src = $src;
        }
        return $html->save();
    }

    /**
     * Обработка текста перед выдачей браузеру.
     *
     * Дейсвтия:
     *   преобразуем все img (имеющие размер) в красивые fancybox элементы
     *   убираем лишние margin для картинок c float: right и float: left
     *   делаем подписи под картинками
     *
     * @author GYL
     */
    function CKEditorPreShow($text) 
    {
        global $g_config;
        
        $offset = 0;

        while (true)
        {
            $pos = strpos($text, "<img ", $offset);
            if ($pos === false)
            {
                break;
            }
            else
            {
                $end = strpos($text, ">", $pos + 1);

                if ($end === false)
                {
                    trigger_error("Invalid html", E_USER_ERROR);
                }
                $end += 1;
                $offset = $end;

                require_once BASEPATH . 'lib/simple_html_dom.php';

                $str = substr($text, $pos, $end - $pos + 1);
                $html = str_get_html($str);

                $img = $html->find("img", 0);

                if ($img)
                {
                    $src   = $img->src;
                    $alt   = $img->alt;
                    $style = $img->style;

                    if (strpos($src, "/upl/" . $g_config['ckeditor4']['upl_dir'] . "/") === 0)
                    {
                        $styles = array();
                        foreach(explode(";", $style) as $s)
                        {
                            $a = explode(":", $s);
                            if (isset($a[0]) && isset($a[1]))
                            {
                                $styles[trim($a[0])] = trim($a[1]);
                            }
                        }
                       
                        if (isset($styles["float"]) && $styles["float"] == "left")
                        {
                            $styles["margin-left"] = "0";
                        }
                        else if (isset($styles["float"]) && $styles["float"] == "right")
                        {
                            $styles["margin-right"] = "0";
                        }
                        if (!isset($styles["margin-bottom"]))
                        {
                            $styles["margin-bottom"] = "3px";
                        }
                       
                        $file = basename($src);
                        $src = SiteRoot("ckeditor4_img&file={$file}");
                       
                        $style = "";
                        foreach ($styles as $k => $v)
                        {
                            if ($k != "width" && $k != "height")
                            {
                                $style .= "$k: $v; ";
                            }
                        }
                        
                        $res = "";
                        $sp = BASEPATH . "upl/" . $g_config['ckeditor4']['upl_dir'] . "/{$file}";
                                         
                        if (isset($styles["width"]) && isset($styles["height"]) && 
                            strpos($styles["width"],  "px") !== false && 
                            strpos($styles["height"], "px") !== false)
                        {
                            $sw = str_replace("px", "", $styles["width"]);
                            $sh = str_replace("px", "", $styles["height"]);

                            // Убеждаемся, что размер не превышает максимальный размер картинки
                            if (is_file($sp))
                            {
                                $sw = min($sw, CKEditor4ImgWidth($sp));
                                $sh = min($sh, CKEditor4ImgHeight($sp));
                            }

                            if (isset($styles["width"]))
                            {
                                $style .= "; width: 100%; height: auto; max-width: {$sw}px;";
                            }
                            $res = "<a class='fancybox' rel='on-page' title='{$alt}' href='{$src}'><img src='{$src}&w={$sw}&h={$sh}' alt='{$alt}' style='{$style}'></a>";
                        }                
                        elseif (isset($styles["width"]) && 
                                strpos($styles["width"],  "px") !== false && 
                                (empty($styles["height"]) || $styles["height"] == "auto"))
                        {
                            $sw = str_replace("px", "", $styles["width"]);

                            // Убеждаемся, что размер не превышает максимальный размер картинки
                            if (is_file($sp))
                            {
                                $sw = min($sw, CKEditor4ImgWidth($sp));
                            }
                            $style .= "; width: 100%; height: auto; max-width: {$sw}px;";

                            $res = "<a class='fancybox' rel='on-page' title='{$alt}' href='{$src}'><img src='{$src}&w={$sw}' alt='{$alt}' style='{$style}'></a>";
                        }                
                        elseif (isset($styles["height"]) && 
                                strpos($styles["height"],  "px") !== false && 
                                (empty($styles["width"]) || $styles["width"] == "auto"))
                        {
                            $sh = str_replace("px", "", $styles["height"]);

                            // Убеждаемся, что размер не превышает максимальный размер картинки
                            if (is_file($sp))
                            {
                                $sh = min($sh, CKEditor4ImgHeight($sp));
                            }
                            $style .= "; height: 100%; width: auto; max-height: {$sh}px;";

                            $res = "<a class='fancybox' rel='on-page' title='{$alt}' href='{$src}'><img src='{$src}&h={$sh}' alt='{$alt}' style='{$style}'></a>";
                        }
                        else
                        {
                            if (is_file($sp))
                            {
                                $sw = CKEditor4ImgWidth($sp);
                            }
                            $style .= "; width: 100%; height: auto; max-width: {$sw}px;";

                            $res = "<img src=\"" . $src . "\" alt=\"" . $alt . "\" style=\"" . $style . "\">";
                        }
                        $offset = $pos + strlen($res);
                       
                        $text = substr($text, 0, $pos) . $res . substr($text, $end);
                    }
                }
            }
        }

        return $text;
    }

    function CKEditor4ImgWidth($path)
    {
        if (!is_readable($path)) return false;
        $image = WideImage::load($path);
        return $image->getWidth();
    }

    function CKEditor4ImgHeight($path)
    {
        if (!is_readable($path)) return false;
        $image = WideImage::load($path);
        return $image->getHeight();
    }
?>
