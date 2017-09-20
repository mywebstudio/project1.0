
<!-- BEGIN CONTENT-->
<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li><a href="/admin/projects">Проекты</a></li>
                <li class="">Создание нового проекта</li>
            </ol>
        </div>
        <div class="section-body contain-lg">
            <div class="row">

                <!-- BEGIN ADD CONTACTS FORM -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Добавление/редактирование проекта</header>
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
                                                <input type="number" class="form-control" id="sort" placeholder="Порядок сортировки" value="<?= $article_id ? $article->sort : null ?>">
                                                <label for="default3">Порядок сортировки</label>
                                            </div>


                                            <div class="form-group">
                                                <label for="section" class=" control-label">Раздел</label>
                                                <select id="section" name="roof" class="form-control">
                                                    <?php foreach ($section as $k => $v):?>
                                                        <option value="<?=$k?>" <?= $article_id ? ($article->section == $k) ? 'selected' : null : null  ?>  ><?=$v?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <input type="text" class="form-control" id="square" placeholder="Общая площадь" value="<?= $article_id ? $article->square : null ?>">
                                                <label for="square">Площадь</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="price" placeholder="Стоимость" value="<?= $article_id ? $article->price : null ?>">
                                                <label for="price">Стоимость</label>
                                            </div>



                                            <div class="form-group">
                                                <input type="text" class="form-control" id="rooms" placeholder="Комнат" value="<?= $article_id ? $article->rooms : null ?>">
                                                <label for="rooms">Комнат</label>
                                            </div>


                                            <div class="form-group">
                                                <input type="text" class="form-control" id="kitchensquare" placeholder="Площадь кухни" value="<?= $article_id ? $article->kitchensquare : null ?>">
                                                <label for="kitchensquare">Площадь кухни</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="typeofhouse" placeholder="Тип дома" value="<?= $article_id ? $article->typeofhouse : null ?>">
                                                <label for="typeofhouse">Тип дома</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="typeofbath" placeholder="Тип санузла" value="<?= $article_id ? $article->typeofbath : null ?>">
                                                <label for="typeofbath">Тип санузла</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="typeofowner" placeholder="Тип собственности" value="<?= $article_id ? $article->typeofowner : null ?>">
                                                <label for="typeofowner">Тип собственности</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="comm" placeholder="Коммуникации" value="<?= $article_id ? $article->comm : null ?>">
                                                <label for="comm">Коммуникации</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="heat" placeholder="Отопление" value="<?= $article_id ? $article->heat : null ?>">
                                                <label for="heat">Отопление</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="oblast" placeholder="Область" value="<?= $article_id ? $article->oblast : null ?>">
                                                <label for="oblast">Область</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="city" placeholder="Город" value="<?= $article_id ? $article->city : null ?>">
                                                <label for="city">Город</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="rayon" placeholder="Район" value="<?= $article_id ? $article->rayon : null ?>">
                                                <label for="rayon">Район</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="adress" placeholder="Адрес" value="<?= $article_id ? $article->adress : null ?>">
                                                <label for="adress">Адрес (Точный, используется для карты. Например: Севастополь, ул. Генерала Петрова 10)</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="balkon" placeholder="Балкон" value="<?= $article_id ? $article->balkon : null ?>">
                                                <label for="balkon">Балкон</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="floors" placeholder="Этажность" value="<?= $article_id ? $article->floors : null ?>">
                                                <label for="floors">Этажность</label>
                                            </div>

                                        </div>

                                        <?php if ($article_id): ?>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="short">Дополнительное описание объекта</label>
                                                    <div id="inlineContent1" class="col-md-12"
                                                         contenteditable="true"><?= Post("full", $article_id ? $article->full : '') ?></div>
                                                    <div class="btn" id="bbb">сохранить</a>
                                                        <!--end .col -->


                                                    </div><!--end .form-group -->
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
                                                                <img data-dz-thumbnail=""
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
                                            <a class="btn btn-flat" href="/admin/projects">Назад</a>
                                            <!--                                        <div type="button" id="submit" class="btn btn-flat btn-accent">Создать</div>-->
                                            <div type="button" id="submit" class="btn btn-flat btn-accent">Создать</div>
                                        <?php endif; ?>
                                        <?php if ($article_id): ?>
                                            <a class="btn btn-flat" href="/admin/projects">Назад</a>
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
            url: "/processorModule/project/fileupload",
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
        $('.removeimg').click(function () {
            var name = $(this).attr('data-name');
            $.ajax({
                url: "/processorModule/project/removeimg",
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
                url: "/processorModule/project/setmainimg",
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
                url: "/processorModule/project/title",
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
                url: "/processorModule/project/sort",
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
                url: "/processorModule/project/published",
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
                url: "/processorModule/project/featured",
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
                url: "/processorModule/project/alias",
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
        $('#price').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/price",
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
        $('#adress').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/adress",
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
            $.ajax({
                url: "/processorModule/project/coord",
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
                        toastr["success"]('', 'Точка на карте установлена');
                    }
                }
            });
        });
    </script>

    <!-- меняем алиас -->
    <script>
        $('#square').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/square",
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
        $('#floors').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/floors",
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
        $('#badrooms').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/badrooms",
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
        $('#rooms').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/rooms",
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
        $('#balkon').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/balkon",
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
        $('#city').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/city",
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
        $('#comm').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/comm",
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
        $('#heat').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/heat",
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
        $('#kitchensquare').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/kitchensquare",
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
        $('#oblast').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/oblast",
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
                url: "/processorModule/project/section",
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
        $('#rayon').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/rayon",
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
        $('#typeofbath').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/typeofbath",
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
        $('#typeofowner').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/typeofowner",
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
        $('#typeofhouse').change(function () {
            var inp = $(this).val();
            $.ajax({
                url: "/processorModule/project/typeofhouse",
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
                url: "/processorModule/project/date",
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
        $('#bbb').click(function () {
            var t = CKEDITOR.instances['inlineContent1'].getData();

            $.ajax({
                url: "/processorModule/project/full",
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
                url: "/processorModule/project/is_removed",
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
                        window.location.href = "/admin/projects";
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
            var alias = $('#alias').val();
            var date = $('#date').val();
            var sort = $('#sort').val();
            var price = $('#price').val();
            var square = $('#square').val();
            var oblast = $('#oblast').val();
            var adress = $('#adress').val();
            var kitchensquare = $('#kitchensquare').val();
            var typeofhouse = $('#typeofhouse').val();
            var typeofbath = $('#typeofbath').val();
            var typeofowner = $('#typeofowner').val();
            var comm = $('#comm').val();
            var heat = $('#heat').val();
            var rayon = $('#rayon').val();
            var balkon = $('#balkon').val();
            var city = $('#city').val();
            var contacts = $('#contacts').val();
            var floors = $('#floors').val();
            var rooms = $('#rooms').val();
            var published = $('#published').val();
            var featured = $('#featured').val();

            $.ajax({
                url: "/processorModule/project/addnew",
                type: "POST",
                datatype: 'json',
                data: {
                    hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                    login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                    section: section,
                    title: title,
                    alias: alias,
                    date: date,
                    sort: sort,
                    price: price,
                    square: square,
                    oblast: oblast,
                    adress: adress,
                    kitchensquare: kitchensquare,
                    typeofhouse: typeofhouse,
                    typeofbath: typeofbath,
                    typeofowner: typeofowner,
                    comm: comm,
                    heat: heat,
                    rayon: rayon,
                    balkon: balkon,
                    city: city,
                    contacts: contacts,
                    floors: floors,
                    rooms: rooms,
                    published: published,
                    featured: featured
                },
                success: function (jsondata) {
                    var res = JSON.parse(jsondata);

                    if (res.status == 'ERROR') {

                        toastr["error"]('', res.msg);

                    } else {
                        toastr["success"]('Cоздано успешно');
                        window.location.href = "/admin/project?article_id=" + res.msg;
                    }
                }
            });
        });
    </script>
    <!-- Создаем новый -->


<?php endif; ?>

<script src="/i/js/admin-theme/libs/toastr/toastr.js"></script>
