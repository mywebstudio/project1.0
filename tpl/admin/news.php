
<!-- BEGIN CONTENT-->
<div id="content">

    <!-- BEGIN TABLE HOVER -->

    <section>

        <div class="section-body contain-lg">

            <!-- BEGIN INTRO -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-primary">Все статьи</h1>
                </div><!--end .col -->
                <div class="col-lg-8">
                    <article class="margin-bottom">
                        <p class="lead">
                            Статьи
                        </p>
                        <a href="/admin/new" class="btn ink-reaction btn-raised btn-primary">Добавить статью</a>
                    </article>
                </div><!--end .col -->
            </div><!--end .row -->
            <!-- END INTRO -->

        </div><!--end .section-body -->
    </section>

    <section class="style-default-bright">

        <div class="section-body">
            <h2 class="text-primary">Все статьи</h2>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Опубликован</th>
                    <th>Избранный</th>
                    <th>Раздел</th>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th class="text-right">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($all as $a):?>
                    <tr>
                        <td><img src="/image/page_image?file=<?=$a->preview?>&w=50&h=50&mode=fitout"></td>
                        <td><label class="checkbox-inline checkbox-styled">
                                <input type="checkbox" title="Опубликован" class="main" value="1" data-id="<?=$a->article_id?>" <?= $a->published ? 'checked' : '' ?>>
                            </label>
                        </td>
                        <td><label class="checkbox-inline checkbox-styled">
                                <input type="checkbox" title="Избранный" class="featured" value="1" data-id="<?=$a->article_id?>" <?= $a->featured ? 'checked' : '' ?>>
                            </label>
                        </td>
                        <td>
                            <?= $g_config['news'][$a->section] ?>
                        </td>
                        <td><?=$a->date?></td>
                        <td><?=$a->title?></td>
                        <td class="text-right">
                            <a href="/admin/new?article_id=<?=$a->article_id?>" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
                            <button type="button" class="btn btn-icon-toggle delete" data-id="<?=$a->article_id?>"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>

            <div class="col-lg-12 text-center">
                <?php IncludeCom("dev/paginator2", array
                (
                    "pageUrl"      => GetCurUrl('page=' . M_PAGINATOR_PAGE),
                    "firstPageUrl" => GetCurUrl('page=' . M_DELETE_PARAM),
                    "total"        => $total,
                    "perPage"      => $per_page,
                    "curPage"      => $page
                ))?>
                <!--Pagination Listed End-->
            </div><!--Pagination end-->
            
        </div><!--end .section-body -->
    </section>
    <!-- END TABLE HOVER -->

</div><!--end #content-->
<!-- END CONTENT -->



<!-- BEGIN JAVASCRIPT -->
<script src="/i/js/admin-theme/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="/i/js/admin-theme/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/i/js/admin-theme/libs/bootstrap/bootstrap.min.js"></script>
<script src="/i/js/admin-theme/libs/spin.js/spin.min.js"></script>
<script src="/i/js/admin-theme/libs/autosize/jquery.autosize.min.js"></script>
<script src="/i/js/admin-theme/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/i/js/admin-theme/core/source/App.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavigation.js"></script>
<script src="/i/js/admin-theme/core/source/AppOffcanvas.js"></script>
<script src="/i/js/admin-theme/core/source/AppCard.js"></script>
<script src="/i/js/admin-theme/core/source/AppForm.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavSearch.js"></script>
<script src="/i/js/admin-theme/core/source/AppVendor.js"></script>
<script src="/i/js/admin-theme/core/demo/Demo.js"></script>
<!-- END JAVASCRIPT -->
<script>
    $('.delete').click(function () {

        var id = $(this).attr('data-id');

        $.ajax({
            url: "/processorModule/new/is_removed",
            type: "POST",
            datatype: 'json',
            data: {
                id: id,
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
                    toastr["success"]('Успех', res.msg);
                    location.reload();
                }
            }
        });
    });
</script>

<!-- меняем публикацию  -->
<script>
    $('.main').change(function () {
        var inp = $(this).prop('checked');
        var id = $(this).attr('data-id');
        var val = 1;
        if(inp == false) val = 0;
        $.ajax({
            url: "/processorModule/new/pub",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: val,
                id: id
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
    $('.featured').change(function () {
        var inp = $(this).prop('checked');
        var id = $(this).attr('data-id');
        var val = 1;
        if(inp == false) val = 0;
        $.ajax({
            url: "/processorModule/new/fet",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: val,
                id: id
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