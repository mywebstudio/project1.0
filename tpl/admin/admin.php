<head>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/material-design-iconic-font.min.css?1421434286" />



    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/i/js/admin-theme/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="/i/js/admin-theme/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>


<!-- BEGIN CONTENT-->
<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Form basic</li>
            </ol>
        </div>
        <div class="section-body contain-lg">

            <!-- BEGIN HORIZONTAL FORM - BASIC ELEMENTS-->
            <form class="form-horizontal form-validate" id="1vform" role="form">
            <div class="card">
                <div class="card-head style-primary">
                    <header>Добавить/редактировать пользователя</header>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="login" class="col-sm-2 control-label">Логин</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required id="login" name="login" value="<?=$login?>" data-msg="Please fill this field">
                            <p class="help-block">Уникальный</p>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="pwd" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" name="pwd" value="<?=$pwd?>" required data-rule-minlength="5">
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="<?=$title?>">
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?=$email?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">Описание</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="desc"  name="desc" value="<?=$desc?>">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Телефон</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" data-inputmask="'mask': '(999) 999-9999'" name="phone" value="<?=$phone?>">

                            </div>
                        </div>



                    <div class="card-actionbar">
                        <div class="card-actionbar-row">
                            <a href="/admin/admins" class="btn" >Назад</a>
                            <?php if(!$admin_id):?>
                                <div type="button" id="submit1" class="btn btn-primary" >Создать</div>

                            <?php endif;?>
                        </div>
                    </div><!--end .card-actionbar -->

                </div><!--end .card-body -->
            </div><!--end .card -->
            <em class="text-caption">Основной список</em>
            </form>
            <!-- END HORIZONTAL FORM - BASIC ELEMENTS-->


        </div><!--end .section-body -->
    </section>
</div><!--end #content-->
<!-- END CONTENT -->


<!-- BEGIN JAVASCRIPT -->

<script src="/i/js/admin-theme/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="/i/js/admin-theme/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/i/js/admin-theme/libs/bootstrap/bootstrap.min.js"></script>
<script src="/i/js/admin-theme/libs/spin.js/spin.min.js"></script>
<script src="/i/js/admin-theme/libs/autosize/jquery.autosize.min.js"></script>
<script src="/i/js/admin-theme/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/i/js/admin-theme/libs/inputmask/jquery.inputmask.bundle.js"></script>
<script src="/i/js/admin-theme/core/source/App.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavigation.js"></script>
<script src="/i/js/admin-theme/core/source/AppOffcanvas.js"></script>
<script src="/i/js/admin-theme/core/source/AppCard.js"></script>
<script src="/i/js/admin-theme/core/source/AppForm.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavSearch.js"></script>
<script src="/i/js/admin-theme/core/source/AppVendor.js"></script>
<script src="/i/js/admin-theme/core/demo/Demo.js"></script>


<script src="/i/js/admin-theme/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/i/js/admin-theme/libs/jquery-validation/dist/additional-methods.min.js"></script>
<!-- END JAVASCRIPT -->


<?php if($admin_id):?>

    <!-- меняем зоголовок -->
<script>
    $('#title').change(function () {
        var inp = $(this).val();
        $.ajax({
            url: "/processorModule/admin/title",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: inp,
                id: <?=$admin_id?>
            },
            success: function (jsondata) {
                var res = JSON.parse(jsondata);

                if (res.status == 'OK') {
                    $('#regular13').html(inp);

                    toastr["success"]('', 'Изменения сохранены');

                }
            }
        });
    });
</script>

    <!-- меняем зоголовок -->
<script>
    $('#login').change(function () {
        var inp = $(this).val();
        $.ajax({
            url: "/processorModule/admin/login",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: inp,
                id: <?=$admin_id?>
            },
            success: function (jsondata) {
                var res = JSON.parse(jsondata);

                if (res.status == 'OK') {
                    $('#regular13').html(inp);

                    toastr["success"]('', 'Изменения сохранены');

                }
            }
        });
    });
</script>

    <!-- меняем зоголовок -->
<script>
    $('#pwd').change(function () {
        var inp = $(this).val();
        $.ajax({
            url: "/processorModule/admin/pwd",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: inp,
                id: <?=$admin_id?>
            },
            success: function (jsondata) {
                var res = JSON.parse(jsondata);

                if (res.status == 'OK') {
                    $('#regular13').html(inp);

                    toastr["success"]('', 'Изменения сохранены');

                }
            }
        });
    });
</script>

    <!-- меняем зоголовок -->
<script>
    $('#desc').change(function () {
        var inp = $(this).val();
        $.ajax({
            url: "/processorModule/admin/desc",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: inp,
                id: <?=$admin_id?>
            },
            success: function (jsondata) {
                var res = JSON.parse(jsondata);

                if (res.status == 'OK') {
                    $('#regular13').html(inp);

                    toastr["success"]('', 'Изменения сохранены');

                }
            }
        });
    });
</script>

    <!-- меняем зоголовок -->
<script>
    $('#phone').change(function () {
        var inp = $(this).val();
        $.ajax({
            url: "/processorModule/admin/phone",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: inp,
                id: <?=$admin_id?>
            },
            success: function (jsondata) {
                var res = JSON.parse(jsondata);

                if (res.status == 'OK') {
                    $('#regular13').html(inp);

                    toastr["success"]('', 'Изменения сохранены');

                }
            }
        });
    });
</script>

    <!-- меняем зоголовок -->
<script>
    $('#email').change(function () {
        var inp = $(this).val();
        $.ajax({
            url: "/processorModule/admin/email",
            type: "POST",
            datatype: 'json',
            data: {
                hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                login: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                value: inp,
                id: <?=$admin_id?>
            },
            success: function (jsondata) {
                var res = JSON.parse(jsondata);

                if (res.status == 'OK') {
                    $('#regular13').html(inp);

                    toastr["success"]('', 'Изменения сохранены');

                }
            }
        });
    });
</script>

    <?php else: ?>

    <!-- Создаем новый -->

    <script>
        $('#submit1').click(function () {

                var title = $('#title').val();
                var login = $('#login').val();
                var pwd = $('#pwd').val();
                var phone = $('#phone').val();
                var desc = $('#desc').val();
                var email = $('#email').val();

                $.ajax({
                    url: "/processorModule/admin/addnew",
                    type: "POST",
                    datatype: 'json',
                    data: {
                        hash: '<?= $_COOKIE['auto_admin_auth_pwd_hash']?>',
                        authlogin: '<?= $_COOKIE['auto_admin_auth_login'] ?>',
                        pwd: pwd,
                        login: login,
                        title: title,
                        phone: phone,
                        desc: desc,
                        email: email
                    },
                    success: function (jsondata) {
                        var res = JSON.parse(jsondata);

                        if (res.status == 'ERROR') {

                            toastr["error"]('', res.msg);

                        } else {
                            window.location.href = "/admin/admins"
                        }
                    }
                });
        });
    </script>

<?php endif;?>