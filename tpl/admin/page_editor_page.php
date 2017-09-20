<?php IncludeCom("dev/ckeditor4_head")?>

<form class"uk-form" action="<?= GetCurUrl()?>" role="form" method="post" <?= Uploader::FORM_LOAD?>>
<div class="uk-width-1-1" style="background-color: #f5f5f5" data-uk-sticky="{top:42}">
    <div class="uk-button-group uk-text-center">
        <button class="uk-button uk-button-primary">
            <i class="uk-icon-save"></i> Сохранить и закрыть
        </button>
        <button class="uk-button uk-button-primary" name="___no_return" value="1">
            <i class="uk-icon-chek"></i> Сохранить
        </button>
        <a class="uk-button" href="<?= SiteRoot("admin/page_editor") ?>">
            <i class="uk-icon-undo"></i> Отмена
        </a>
    </div>
</div>


 <div class="uk-container uk-container-center">

    <?php if($msg): ?>
        <div class="uk-alert uk-margin-top uk-text-center"><?= $msg?></div>
    <?php endif; ?>


    <div class="uk-width-1-1 uk-text-center uk-margin-large-top">
        <h1>Страница <span class="label uk-label-primary"><?= $file?></span> на языке <span class="label label-success"><?= $g_arrLangs[$lang]["name"]?></span></h1>
    </div>

     <div class="uk-width-1-1 uk-margin-large-top uk-panel uk-panel-box">

       
        <?php if (count($g_arrLangs) > 1):?>
            <div class="uk-form-row">
                <label for="inputLang">Сохранить для языка:</label>
                <select class="form-control" name="___lang" id="inputLang">
                    <?php foreach($g_arrLangs as $k => $v):?>
                        <option value="<?= $k?>"  <?= Post("___lang", $lang) == $k ? "selected" : ""?> ><?= $g_arrLangs[$k]['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        <?php endif;?>


        <input type="hidden" name="___is_apply" value="1">


        <?php foreach ($curLang as $k => $v):?>

            <?php if (!in_array($k, $seoVars)):?>
                <div class="uk-form-row">
                    <label for="input_<?= $k?>"><?= $k?>:</label>

                    <?php if(substr($k, -strlen("_no_tags")) == "_no_tags" || substr($k, -strlen("_notg")) == "_notg"):?>
                        <textarea id="input_<?= $k?>" class="uk-form uk-width-1-1" rows="15" name="<?= $k?>"><?= Post($k, $v)?></textarea>

                    <?php elseif(substr($k, -strlen("_tags")) == "__tags" || substr($k, -strlen("_tg")) == "_tg"):?>
                        <textarea id="input_<?= $k?>" class="uk-form uk-width-1-1" rows="15" name="<?= $k?>"><?= Post($k, $v, M_HTML_FILTER_OFF | M_XSS_FILTER_OFF) ?></textarea>
                    <?php else:?>
                        <?php IncludeCom("dev/richtext", array
                              (
                                  "name"  => $k, 
                                  "value" => Post($k, $v, M_HTML_FILTER_OFF | M_XSS_FILTER_OFF),
                                  "mode"  => "full"
                              ));
                         ?>
                    <?php endif;?>

                </div>
            <?php endif;?>

        <?php endforeach;?>

        <?php if ($showSEO):?>
            <h3 class="uk-text-center">Задайте новые значения для SEO параметров:</h3>
            <p class="uk-text-center">
                SEO параметры нужны для продвижения сайта в интернете. Если вы не знаете, что в них вписать, то просто оставьте эти поля нетронутыми.<br>
                Помните, что если для страницы сайта не задан <em>title</em>, то он будет скопирован из тега <em>h1</em>.
            </p>

            <div class="uk-form-row uk-text-center">
                <label for="inputTitle">Title:</label>
                <textarea id="inputTitle" class="uk-form" name="m_title"><?= Post('m_title', @$curLang['m_title'])?></textarea>
            </div>
            <div class="uk-form-row uk-text-center">
                <label for="inputKeywords">Key words:</label>
                <textarea id="inputKeywords" class="form-control" name="m_keyWords"><?= Post('m_keyWords', @$curLang['m_keyWords'])?></textarea>
            </div>
            <div class="uk-form-row uk-text-center">
                <label for="inputDesc">Description:</label>
                <textarea id="inputDesc" class="form-control" name="m_description"><?= Post('m_description', @$curLang['m_description'])?></textarea>
            </div>
        <?php endif;?>



        </div>
        </div>
    </form>
