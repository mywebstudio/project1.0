<div class="uk-width-1-1" style="background-color: #f5f5f5" data-uk-sticky="{top:42}">
    <a class="uk-text-center uk-button uk-button-success" href="<?= Root('admin/page_editor_add')?>">
        <i class="uk-icon-plus"></i> Создать
    </a>
</div>

<div class="uk-container uk-container-center">

    <?php if($msg): ?>
        <div class="uk-alert uk-margin-top uk-text-center"><?= $msg?></div>
    <?php endif; ?>


    <div class="uk-width-1-1 uk-text-center uk-margin-large-top">
        <h1>Менеджер страниц</h1>
    <p class="uk-text-center">
        Старницы появляются внутри системы, для их испольщования на сайте, нужно вставить ссылки на эти файлы в нужных местах страниц.
    </p>
     </div>

    

    
    <form action="<?= GetCurUrl()?>" method="post">
      <div class="uk-width-1-1 class="uk-text-center"">
            <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                <?php foreach($all as $path => $pageLangs):?>
                    <tr>
                        <td>
                            <?php for ($i = 0; $i < substr_count(substr($path, 0, -1), '/'); ++$i):?>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                            <?php endfor?>
       
                            <?php if (substr($path, -1) == "/"):?>
                                <i class="uk-icon uk-icon-folder-open"></i> &nbsp;
                                <em><?= basename($path)?></em>
                            <?php else:?>
                                <i class="uk-icon-file uk-icon"></i> &nbsp;
                                <strong><?= str_replace(".php", "", basename($path))?></strong>
                            <?php endif?>
       
                            <?php if (isset($g_config['page_editor']['labels'][$path])):?>
                                &nbsp; <span><?= $g_config['page_editor']['labels'][$path]?></span>
                            <?php endif?>
                        </td>
                        <td width=1>
                            <?php if (count($g_arrLangs) == 1):?>
                                <a href="<?= SiteRoot("admin/page_editor_page&lang=" . DEF_LANG . "&page=" . urlencode($path))?>" class="uk-button uk-button-primary" title="Редактировать страницу">
                                    <?= $g_arrLangs[DEF_LANG]['name']?>
                                </a>
                            <?php else:?>
                                <div class="uk-panel">
                                    
                                    <ul class="uk-nav">
                                        <?php foreach ($g_arrLangs as $lang => $langInfo):?>
                                            <?php if (substr($path, -1) != "/" && in_array($lang, $pageLangs)):?>
                                                <li>
                                                    <a class="uk-button uk-button-primary uk-button-mini" href="<?= SiteRoot("admin/page_editor_page&lang=" . $lang . "&page=" . urlencode($path))?>">
                                                        <?= $langInfo['name']?>
                                                    </a>
                                                </li><br>
                                            <?php endif?>
                                        <?php endforeach?>
                                    </ul>
                                </div>
                            <?php endif?>
                        </td>
                        <td width=1> <!-- @todo Добавить защиту от дурака (запрет на удаление файлов в dev, autoload и т.д.) -->
                            <button class="uk-button uk-button-danger uk-button-mini" name="remove_page" value="<?= str_replace(".php", "", $path)?>" onclick="return confirm('Удалить данную страницу?')">
                                <i class="uk-icon-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach?>
            </table>
        </div>
    </form>
</div>
