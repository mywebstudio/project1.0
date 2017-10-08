
<div id="menubar" class="menubar-inverse">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="/admin/home">
                <span class="text-lg text-bold text-primary ">Панель управления</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">


            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="/" target="_blank">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Сайт</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->


            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="/admin/home" >
                    <div class="gui-icon"><i class="md md-web"></i></div>
                    <span class="title">Админка</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->


            <!-- BEGIN LEVELS -->
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-star fa-fw"></i></div>
                    <span class="title">Кухни</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="/admin/articles"><span class="title">Все кухни</span></a></li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Добавить</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/article"><span class="title">Кухня</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /submenu-li -->
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END LEVELS -->



            <!-- BEGIN LEVELS -->
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-users fa-fw"></i></div>
                    <span class="title">Доступы</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="/admin/admins"><span class="title">Доступы</span></a></li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Создать</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/admin"><span class="title">Админимтратора</span></a></li>

                        </ul><!--end /submenu -->
                    </li><!--end /submenu-li -->
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END LEVELS -->


            <!-- BEGIN DASHBOARD -->
            <li class="hidden">
                <a href="/admin/dashboards/dashboard" >
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->
            

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2017</span> <strong></strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->

