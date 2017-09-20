<html lang="<?= LANG?>" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= $g_config['charset']?>" />
        <title><?= $title?></title>
        <link rel="icon" href="<?= Root('favicon.ico')?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?= Root('favicon.ico')?>" type="image/x-icon" />
        <meta http-equiv="cleartype" content="on">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php IncludeCom('admin/uikit')?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!--        <script src="/i/js/jquery-2.1.4.js"></script>-->
        <meta name="robots" content="noindex, nofollow">




        <!-- BEGIN STYLESHEETS -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
              type='text/css'/>
        <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/bootstrap.css?1422792965"/>
        <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/materialadmin.css?1425466319"/>
        <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/font-awesome.min.css?1422529194"/>
        <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/material-design-iconic-font.min.css?1421434286"/>
        <link type="text/css" rel="stylesheet"
              href="/i/css/admin-theme/libs/bootstrap-datepicker/datepicker3.css?1424887858"/>

        <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/libs/select2/select2.css?1424887856" />
        <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/libs/summernote/summernote.css?1425218701"/>

        <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/libs/dropzone/dropzone-theme.css?1424887864"/>
        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="/i/js/admin-theme/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="/i/js/admin-theme/libs/utils/respond.min.js?1403934956"></script>


        <![endif]-->
        
    </head>
    <body class="menubar-hoverable header-fixed ">
    <!-- BEGIN HEADER-->
    <?php GetCurUrl() != '/admin/login' ? IncludeCom('admin/header') : NULL ?>
    <!-- END HEADER-->


    <!-- BEGIN BASE-->
    <div id="base">

        <!-- BEGIN OFFCANVAS LEFT -->
        <div class="offcanvas">
        </div><!--end .offcanvas-->
        <!-- END OFFCANVAS LEFT -->

        <!-- BEGIN CONTENT-->
        <?= $content ?>
        <!-- END CONTENT -->

        <!-- BEGIN MENUBAR-->
        <?php GetCurUrl() != '/admin/login' ? IncludeCom('admin/admin_menu') : NULL ?>
        <!-- END MENUBAR-->

        <!-- BEGIN OFFCANVAS RIGHT -->
        <?php IncludeCom('admin/offcanvas_right') ?>
        <!-- END OFFCANVAS RIGHT -->

    </div><!--end #base-->
    <!-- END BASE -->

    <script src="/i/js/admin-theme/libs/toastr/toastr.js"></script>


    </body>
</html>
