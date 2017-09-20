<head>
    <title>Material Admin - Static tables</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/materialadmin.css" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/material-design-iconic-font.min.css" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/i/js/admin-theme/libs/utils/html5shiv.js"></script>
    <script type="text/javascript" src="/i/js/admin-theme/libs/utils/respond.min.js"></script>
    <![endif]-->
</head>
<!-- BEGIN CONTENT-->
<div id="content">

    <!-- BEGIN TABLE HOVER -->

    <section>

        <div class="section-body contain-lg">

            <!-- BEGIN INTRO -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-primary">Все подписчики</h1>
                </div><!--end .col -->
                <div class="col-lg-8">
                    <article class="margin-bottom">
                        <p class="lead">
                            Подписчики
                        </p>
                        <a id="#addbutton" class="btn ink-reaction btn-raised btn-primary add">Добавить подписчика</a>
                        <input id="email" type="email" class="col-lg-4">
                    </article>
                </div><!--end .col -->
            </div><!--end .row -->
            <!-- END INTRO -->

        </div><!--end .section-body -->
    </section>

    <section class="style-default-bright">

        <div class="section-body">
            <h2 class="text-primary">Все подписчики</h2>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Дата регистрации</th>
                    <th>Email</th>
                    <th>Активен</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($all as $a):?>
                    <tr>
                        <td><?=$a->article_id?></td>
                        <td><?=$a->date?></td>
                        <td><?=$a->email?></td>
                        <td>
                            <label class="checkbox-inline checkbox-styled">
                                <input type="checkbox" title="Нижнее меню" class="delete" value="1" data-id="<?=$a->article_id?>" <?= $a->is_removed ? '' : 'checked' ?>>
                            </label>
                        </td>

                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
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
<!-- меняем публикацию  -->
<script>
    $('.delete').change(function () {
        var inp = $(this).prop('checked');
        var id = $(this).attr('data-id');
        var val = 1;
        if(inp == false) val = 0;
        $.ajax({
            url: "/processorModule/email/delete",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: val,
                id: id
            },
            success: function (jsondata) {
                console.log(val);
                console.log(id);

                var res = JSON.parse(jsondata);

                if (res.status == 'OK') {
                    toastr["success"]('', 'Изменения сохранены');
                }
            }
        });
    });
</script>

<script>
    $('.add').click(function () {
        $.ajax({
            url: "/processorModule/email/add",
            type: "POST",
            datatype: 'json',
            data: {
                email: $('#email').val(),
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
                    toastr["success"]('Добавлено', res.msg);
                    location.reload();
                }
            }
        });
    });
</script>