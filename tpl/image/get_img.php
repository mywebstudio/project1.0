<?php

// Относительный путь к каталогу в котором будет происходить поиск исходной картинки
$srcPath   = empty($srcPath)   ? $g_config['get_img']['upl_file_path'] : $srcPath;
// Относительный путь к каталогу в котором будет сохранана обработанная картинка
$tmpPath   = empty($tmpPath)   ? $g_config['get_img']['tmp_file_path'] : $tmpPath;
// Полный путь к картинке, которая будет взята вместо исходной, если та не будет найдена
$noImgPath = empty($noImgPath) ? $g_config['get_img']['no_image_path'] : $noImgPath;
// Цвет заливки фона
$fillColor = empty($fillColor) ? $g_config['get_img']['fill_color']    : $fillColor;

$file = empty($file) ? "" : basename(str_replace("..", '', $file));

$w = empty($width)  ? 0 : abs(intval($width));
$h = empty($height) ? 0 : abs(intval($height));

$w = min($w, $g_config['get_img']['max_w']);
$h = min($h, $g_config['get_img']['max_h']);

$w = $w ? $w : null;
$h = $h ? $h : null;

$mode = empty($mode) ? "scale" : $mode;

if (!in_array($mode, array("scale", "fitin", "fitout")))
{
    trigger_error("Invalid mode param ({$mode})!", E_USER_ERROR);
}

// Путь к картинке, которую будем ресайзить
$srcImg = BASEPATH . $srcPath . $file;

// Если картинка не нашлась, то берем картинку с надписью "Нет изображения"
if (!is_file($srcImg))
{
    $srcImg = $noImgPath;
    $file = basename($srcImg);
}

// Если нет даже картинки с надписью "Нет изображения", то пора аварийно заврешиться.
if (!is_file($srcImg))
{
    trigger_error("Invalid config 'no_image_path' param ($noImgPath)!", E_USER_ERROR);
}

// Путь к картинке, которая получится после ресайза
$thumbImg = BASEPATH . $tmpPath . "{$w}_{$h}_{$mode}/{$file}";

// На всякий случай блокируем некоторые расширения
$ext = BrowserDataCache::Ext($srcImg);
if (in_array($ext, array('php', 'php5', 'html', 'htm')))
{
    trigger_error("Invalid file extension '{$ext}'!", E_USER_ERROR);
}

if ($w || $h)
{
    if (!file_exists($thumbImg))
    {
        FileSys::MakeDir(dirname($thumbImg));
        $wImg = WideImage::load($srcImg);

        if ($w && $h && $mode !== "scale")
        {
            if ($mode === "fitout")
            {
                $wImg = $wImg->resize($w, $h, 'outside', 'down')->crop('center', 'middle', $w, $h);
            }
            elseif ($mode === "fitin")
            {
                $wImg = $wImg->resizeDown($w, $h, 'inside', 'down');
            }
            $wImgBack = WideImage::createTrueColorImage($w, $h);
            $canvas = $wImgBack->getCanvas();
            $canvas->filledRectangle(0, 0, $w, $h, $wImgBack->allocateColor($fillColor[0], $fillColor[1], $fillColor[2]));
            $wImg = $wImgBack->merge($wImg, 'center', 'middle');
        }
        else // scale
        {
            $wImg = $wImg->resizeDown($w, $h, 'inside', 'down');
        }

        if ($ext == "jpg" || $ext == "jpeg" || $ext == "jpe")
        {
            $wImg->saveToFile($thumbImg, 90); // Без этого хака jpg изображение не сохранится
        }
        else
        {
            $wImg->saveToFile($thumbImg);
        }
        // !!! Здесь можно добавить наложение watermark. Пример:
        // Watermark($thumbImg, $thumbImg);
    }
    BrowserDataCache::OutFile($thumbImg);
}
else
{
    // !!! При наложении ватермарка здесь всё же придется создать временную картинку и код будет следующим:
    // Watermark($srcImg, $thumbImg);
    // BrowserDataCache::OutFile($thumbImg);
    BrowserDataCache::OutFile($srcImg);
}
?>