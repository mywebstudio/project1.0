<head>
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

</head>

<?=$msg?>
<!-- BEGIN LOGIN SECTION -->
<section class="section-account">
    <div class="img-backdrop" style="background-image: url('../../assets/img/img16.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <br/>
                    <span class="text-lg text-bold text-primary">Студия WEB TEC</span>
                    <br/><br/>
                    <form class="form floating-label" action="<?=GetCurUrl()?>" accept-charset="utf-8" method="post">
                        <input type="hidden" name="is_login" value="1">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="login">
                            <label for="username">Логин</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="pwd">
                            <label for="password">Пароль</label>

                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        <input type="checkbox"> <span>Запомнить меня</span>
                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-xs-12 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">Вход</button>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div><!--end .col -->

            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
