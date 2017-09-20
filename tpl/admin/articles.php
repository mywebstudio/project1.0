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
                            статьи
                        </p>
                        <a href="/admin/article" class="btn ink-reaction btn-raised btn-primary">Добавить статью</a>
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
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th class="text-right">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($all as $a):?>
                    <tr>
                        <td><?=$a->date?></td>
                        <td><?=$a->title?></td>
                        <td><?=ShortArticleText(150,$a->full)?></td>
                        <td class="text-right">
                            <a href="/admin/article?article_id=<?=$a->article_id?>" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a>
                            <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
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
