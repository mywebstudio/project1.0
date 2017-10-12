
<!-- BEGIN CONTENT-->
<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li><a href="/admin/prints">Вся печать</a></li>
                <li class="">Создание нового материала</li>
            </ol>
        </div>
        <div class="section-body contain-lg">
            <div class="row">

                <!-- BEGIN ADD CONTACTS FORM -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Добавление/редактирование материала</header>
                        </div>
                        <div class="form" role="form">

                            <!-- BEGIN DEFAULT FORM ITEMS -->
                            <div class="card-body style-primary form-inverse">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group floating-label">
                                                    <input type="text" class="form-control input-lg" id="title" required
                                                           name="title"
                                                           value="<?= Post("title", $article_id ? $article->title : NULL) ?>">
                                                    <label for="firstname">Заголовок</label>
                                                </div>
                                            </div><!--end .col -->
                                            <div class="col-md-6">
                                                <div class="form-group floating-label">
                                                    <input type="text" class="form-control input-lg" id="alias"
                                                           name="alias"
                                                           value="<?= Post("alias", $article_id ? $article->alias : NULL) ?>">
                                                    <label for="lastname">Алиас</label>
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group floating-label">
                                                    <input type="text" class="form-control input-lg" id="short"
                                                           name="title"
                                                           value="<?= Post("short", $article_id ? $article->short : NULL) ?>">
                                                    <label for="firstname">Коротко</label>
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->

                                    </div><!--end .col -->
                                </div><!--end .row -->
                            </div><!--end .card-body -->
                            <!-- END DEFAULT FORM ITEMS -->

                            <!-- BEGIN FORM TABS -->
                            <div class="card-head style-primary">
                                <ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
                                    <li class="active"><a href="#main">Основное</a></li>
                                    <?php if ($article_id): ?>
                                        <li><a href="#galery">Галерея</a></li>
                                    <?php endif; ?>

                                </ul>
                            </div><!--end .card-head -->
                            <!-- END FORM TABS -->

                            <!-- BEGIN FORM TAB PANES -->
                            <div class="card-body tab-content">
                                <div class="tab-pane active" id="main">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" id="published" value="1" <?= $article_id ? $article->published ? 'checked' : '' : 'checked' ?>  >
                                                        <span>Опубликован</span>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="checkbox checkbox-styled">
                                                    <label>
                                                        <input type="checkbox" id="featured" value="1" <?= $article_id ? $article->featured ? 'checked' : '' : '' ?>  >
                                                        <span>Избранныый</span>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="section" class=" control-label">Раздел</label>
                                                <select id="section" name="roof" class="form-control">
                                                    <?php foreach ($g_config['print'] as $k => $v):?>
                                                        <option value="<?=$k?>" <?= $article_id ? ($article->section == $k) ? 'selected' : null : null  ?>  ><?=$v?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group date" id="demo-date-inline"
                                                 data-date-format="yyyy-mm-dd">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control" id="date"
                                                           value="<?= Post("date", $article_id ? $article->date : $today) ?>">
                                                    <label>Дата</label>
                                                </div>
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control input-lg" id="price"
                                                       name="price"
                                                       value="<?= Post("price", $article_id ? $article->price : NULL) ?>">
                                                <label for="price">Стоимость</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="number" class="form-control" id="sort" placeholder="Порядок сортировки" value="<?= $article_id ? $article->sort : null ?>">
                                                <label for="default3">Порядок сортировки</label>
                                            </div>
                                        </div>

                                        <?php if ($article_id): ?>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <div class="btn" id="bbb">сохранить</div>
                                                    <label for="short">Основное описание</label>
                                                    <div id="inlineContent1" class="col-md-12"
                                                         contenteditable="true"><?= Post("full", $article_id ? $article->full : '') ?></div>
                                                    <!--end .form-group -->
                                                </div><!--end .tab-pane -->
                                            </div><!--end .col -->


                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <div class="btn" id="bbb2">сохранить</div><!--end .form-group -->
                                                    <label for="short">Дополнительное описание</label>
                                                    <div id="inlineContent2" class="col-md-12"
                                                         contenteditable="true"><?= Post("custom", $article_id ? $article->custom : '') ?></div>

                                                </div><!--end .tab-pane -->
                                            </div><!--end .col -->

                                        <?php endif; ?>
                                    </div>
                                </div><!--end .tab-pane -->


                                <div class="tab-pane" id="galery">
                                    <div class="card">
                                        <div class="card-head style-primary">
                                            <header>Загрузка файлов</header>
                                        </div>
                                        <div class="card-body no-padding">
                                            <div class="dropzone" id="my-dropzone">
                                                <?php if ($article_id): ?>

                                                    <?php foreach ($gallery as $key => $g) { ?>

                                                        <div
                                                            class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                                            <div class="dz-image">
                                                                <img data-dz-thumbnail="" id="<?=$key?>"
                                                                     src="/image/page_image?file=<?= $g ?>&h=120&w=120&mode=fitin">
                                                            </div>
                                                            <div class="dz-details">
                                                                <div class="dz-filename"><span><?= $g ?></span>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="removeimg" data-name="<?= $g ?>">Удалить
                                                                файл</a><br>
                                                            <?php if($article->preview == $g):?><span>Обложка</span>
                                                            <?php else:?><a href="#" class="setmainimg" data-name="<?= $g ?>">На обложку</a><?php endif;?>

                                                        </div>

                                                    <?php }
                                                else: ?>

                                                    <div class="dz-message">
                                                        <h3>Перетащите изобрадения сюда или нажмите.</h3>
                                                        <em>(Загрузка картинок для галлереи <strong>только
                                                                картинки</strong>.)</em>
                                                    </div>

                                                <?php endif; ?>

                                                <input name="file" type="hidden" id="preview" multiple/>
                                                <input name="id"
                                                       value="<?= $article_id ? $article->article_id : NULL ?>"
                                                       type="hidden"/>
                                                <input name="hash" value="<?= $_COOKIE['auto_admin_auth_pwd_hash'] ?>"
                                                       type="hidden"/>
                                                <input name="login" value="<?= $_COOKIE['auto_admin_auth_login'] ?>"
                                                       type="hidden"/>
                                            </div>
                                        </div><!--end .card-body -->
                                    </div><!--end .card -->
                                </div><!--end .tab-pane -->




                                <!-- BEGIN FORM FOOTER -->
                                <div class="card-actionbar">
                                    <div class="card-actionbar-row">

                                        <?php if (!$article_id): ?>
                                            <a class="btn btn-flat" href="/admin/prints">Назад</a>
                                            <!--                                        <div type="button" id="submit" class="btn btn-flat btn-accent">Создать</div>-->
                                            <div type="button" id="submit" class="btn btn-flat btn-accent">Создать</div>
                                        <?php endif; ?>
                                        <?php if ($article_id): ?>
                                            <a class="btn btn-flat" href="/admin/prints">Назад</a>
                                            <button type="button" class="btn btn-icon-toggle btn-danger delete" data-id="<?=$article_id?>"><i class="fa fa-trash-o"></i></button>
                                        <?php endif; ?>
                                    </div><!--end .card-actionbar-row -->
                                </div><!--end .card-actionbar -->
                                <!-- END FORM FOOTER -->

                            </div>
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <!-- END ADD CONTACTS FORM -->

                </div><!--end .row -->
            </div><!--end .section-body -->
    </section>
</div><!--end #content-->
<!-- END CONTENT -->


<script src="/i/js/admin-theme/libs/bootstrap/bootstrap.min.js"></script>
<script src="/i/js/admin-theme/libs/spin.js/spin.min.js"></script>
<script src="/i/js/admin-theme/libs/autosize/jquery.autosize.min.js"></script>
<script src="/i/js/admin-theme/libs/inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="/i/js/admin-theme/libs/moment/moment.min.js"></script>
<script src="/i/js/admin-theme/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<script src="/i/js/admin-theme/libs/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="/i/js/admin-theme/libs/bootstrap-rating/bootstrap-rating-input.min.js"></script>
<script src="/i/js/admin-theme/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/i/js/admin-theme/libs/microtemplating/microtemplating.min.js"></script>

<script src="/i/js/admin-theme/libs/dropzone/dropzone.js"></script>
<script src="/i/js/admin-theme/libs/select2/select2.min.js"></script>
<script src="/i/js/admin-theme/libs/ckeditor/ckeditor.js"></script>
<script src="/i/js/admin-theme/libs/ckeditor/adapters/jquery.js"></script>
<script src="/i/js/admin-theme/core/source/App.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavigation.js"></script>
<script src="/i/js/admin-theme/core/source/AppOffcanvas.js"></script>
<script src="/i/js/admin-theme/core/source/AppCard.js"></script>
<script src="/i/js/admin-theme/core/source/AppForm.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavSearch.js"></script>
<script src="/i/js/admin-theme/core/source/AppVendor.js"></script>
<script src="/i/js/admin-theme/core/demo/Demo.js"></script>
<script src="/i/js/admin-theme/core/demo/DemoPageContacts.js"></script>
<script src="/i/js/admin-theme/core/demo/DemoFormComponents.js"></script>

<script src="/i/js/admin-theme/core/demo/DemoFormEditors.js"></script>
<!-- END JAVASCRIPT -->


<?php if ($article_id): ?>
    <script>
        var myDropzone = new Dropzone(document.getElementById("my-dropzone"), {
            url: "/processorModule/prints/fileupload",
            params: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                id: <?= $article_id;?>
            },
            renameFilename: true,
            dictDefaultMessage: "Перетищите файлы",
            autoQueue: true
        });
        myDropzone.on("addedfile", function () {
            toastr["success"]('', 'Файл добавлен');
//            location.reload();
        });
    </script>

    <script>
        CKEDITOR.replace('inlineContent1');
    </script>

    <script>
        CKEDITOR.replace('inlineContent2');
    </script>
        
    <script>
        $('.removeimg').click(function () {
            var name = $(this).attr('data-name');
            $.ajax({
                url: "/processorModule/prints/removeimg",
                type: "POST",
                datatype: 'json',
                data: {
                    name: name,
                    id: <?= $article_id;?>,
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>'
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'ERROR') {
                        toastr["error"]('', res.msg);
                    }
                    if (res.status == 'OK') {
                        toastr["success"]('Удалено', res.msg);
                        location.reload();
                    }
                }
            });
        });
    </script>

    <script>
        $('.setmainimg').click(function () {
            var name = $(this).attr('data-name');
            $.ajax({
                url: "/processorModule/prints/setmainimg",
                type: "POST",
                datatype: 'json',
                data: {
                    name: name,
                    id: <?= $article_id;?>,
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>'
                },
                success: function (jsondata) {
                    console.log(jsondata);
                    var res = JSON.parse(jsondata);

                    if (res.status == 'ERROR') {
                        toastr["error"]('', res.msg);
                    }
                    if (res.status == 'OK') {
                        toastr["success"]('Обложка выбрана', res.msg);
                        location.reload();
                    }
                }
            });
        });
    </script>

    <!-- меняем зоголовок -->
    <script>
        $('#title').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/title",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: inp,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);
                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем зоголовок -->
    <script>
        $('#short').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/short",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: inp,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);
                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>


    <!-- меняем сортировку -->
    <script>
        $('#sort').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/sort",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: inp,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем сортировку -->
    <script>
        $('#price').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/price",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: inp,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем публикацию  -->
    <script>
        $('#published').change(function () {
            var inp = $(this).prop('checked');
            var val = 1;
            if(inp == false) val = 0;
            $.ajax({
                url: "/processorModule/prints/published",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: val,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем публикацию  -->
    <script>
        $('#featured').change(function () {
            var inp = $(this).prop('checked');
            var val = 1;
            if(inp == false) val = 0;
            $.ajax({
                url: "/processorModule/prints/featured",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: val,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>


    <!-- меняем алиас -->
    <script>
        $('#alias').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/alias",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: inp,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {


                        toastr["success"]('', 'Изменения сохранены');

                    }
                }
            });
        });
    </script>

    <!-- меняем алиас -->
    <script>
        $('#section').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/section",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: inp,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);
                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем зоголовок -->
    <script>
        $('#date').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/date",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: inp,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем зоголовок -->
    <script>
        //        CKEDITOR.instances['inlineContent1'].afterSetData( function () {
        $('#bbb2').click(function () {
            var t = CKEDITOR.instances['inlineContent2'].getData();

            $.ajax({
                url: "/processorModule/prints/custom",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: t,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем зоголовок -->
    <script>
        //        CKEDITOR.instances['inlineContent1'].afterSetData( function () {
        $('#bbb').click(function () {
            var t = CKEDITOR.instances['inlineContent1'].getData();

            $.ajax({
                url: "/processorModule/prints/full",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: t,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем зоголовок -->
    <script>
        //        CKEDITOR.instances['inlineContent1'].afterSetData( function () {
        $('#bbb2').click(function () {
            var t = CKEDITOR.instances['inlineContent2'].getData();

            $.ajax({
                url: "/processorModule/prints/custom",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    value: t,
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('', 'Изменения сохранены');
                    }
                }
            });
        });
    </script>

    <!-- меняем зоголовок -->
    <script>
        $('.delete').click(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/prints/is_removed",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    id: <?=$article_id?>
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'OK') {
                        toastr["success"]('Статья удалена');
                        window.location.href = "/admin/prints";
                    }
                }
            });
        });
    </script>

<?php else: ?>

    <!-- Создаем новый -->
    <script>
        $('#submit').click(function () {

            var section = $('#section').val();
            var title = $('#title').val();
            var short = $('#short').val();
            var alias = $('#alias').val();
            var date = $('#date').val();
            var sort = $('#sort').val();
            var published = $('#published').val();
            var featured = $('#featured').val();

            $.ajax({
                url: "/processorModule/prints/addnew",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    section: section,
                    title: title,
                    short: short,
                    alias: alias,
                    date: date,
                    sort: sort,
                    published: published,
                    featured: featured
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'ERROR') {

                        toastr["error"]('', res.msg);

                    } else {
                        toastr["success"]('Cоздано успешно');
                        window.location.href = "/admin/print?article_id=" + res.msg;
                    }
                }
            });
        });
    </script>
    <!-- Создаем новый -->


<?php endif; ?>

<script src="/i/js/admin-theme/libs/toastr/toastr.js"></script>
