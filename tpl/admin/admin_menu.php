
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
                    <span class="title">Объекты</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="/admin/articles"><span class="title">Все объекты</span></a></li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Создать</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/article"><span class="title">объект</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /submenu-li -->
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END LEVELS -->

 

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
                            <li><a href="/admin/admin"><span class="title">Подписчика</span></a></li>


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

            <!-- BEGIN EMAIL -->
            <li class="gui-folder hidden">
                <a>
                    <div class="gui-icon"><i class="md md-email"></i></div>
                    <span class="title">Email</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="/admin/mail/inbox" ><span class="title">Inbox</span></a></li>
                    <li><a href="/admin/mail/compose" ><span class="title">Compose</span></a></li>
                    <li><a href="/admin/mail/reply" ><span class="title">Reply</span></a></li>
                    <li><a href="/admin/mail/message" ><span class="title">View message</span></a></li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END EMAIL -->

            <!-- BEGIN DASHBOARD -->
            <li  class="hidden">
                <a href="/admin/layouts/builder" >
                    <div class="gui-icon"><i class="md md-web"></i></div>
                    <span class="title">Layouts</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            <!-- BEGIN UI -->
            <li class="gui-folder hidden">
                <a>
                    <div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
                    <span class="title">UI elements</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="/admin/ui/colors" ><span class="title">Colors</span></a></li>
                    <li><a href="/admin/ui/typography" ><span class="title">Typography</span></a></li>
                    <li><a href="/admin/ui/cards" ><span class="title">Cards</span></a></li>
                    <li><a href="/admin/ui/buttons" ><span class="title">Buttons</span></a></li>
                    <li><a href="/admin/ui/lists" ><span class="title">Lists</span></a></li>
                    <li><a href="/admin/ui/tabs" ><span class="title">Tabs</span></a></li>
                    <li><a href="/admin/ui/accordions" ><span class="title">Accordions</span></a></li>
                    <li><a href="/admin/ui/messages" ><span class="title">Messages</span></a></li>
                    <li><a href="/admin/ui/offcanvas" ><span class="title">Off-canvas</span></a></li>
                    <li><a href="/admin/ui/grid" ><span class="title">Grid</span></a></li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Icons</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/ui/icons/materialicons" ><span class="title">Material Design Icons</span></a></li>
                            <li><a href="/admin/ui/icons/fontawesome" ><span class="title">Font Awesome</span></a></li>
                            <li><a href="/admin/ui/icons/glyphicons" ><span class="title">Glyphicons</span></a></li>
                            <li><a href="/admin/ui/icons/skycons" ><span class="title">Skycons</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END UI -->

            <!-- BEGIN TABLES -->
            <li class="gui-folder hidden">
                <a>
                    <div class="gui-icon"><i class="fa fa-table"></i></div>
                    <span class="title">Tables</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="/admin/tables/static" ><span class="title">Static Tables</span></a></li>
                    <li><a href="/admin/tables/dynamic" ><span class="title">Dynamic Tables</span></a></li>
                    <li><a href="/admin/tables/responsive" ><span class="title">Responsive Table</span></a></li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END TABLES -->

            <!-- BEGIN FORMS -->
            <li class="gui-folder hidden">
                <a>
                    <div class="gui-icon"><span class="glyphicon glyphicon-list-alt"></span></div>
                    <span class="title">Forms</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="/admin/forms/basic" ><span class="title">Form basic</span></a></li>
                    <li><a href="/admin/forms/advanced" class="active"><span class="title">Form advanced</span></a></li>
                    <li><a href="/admin/forms/layouts" ><span class="title">Form layouts</span></a></li>
                    <li><a href="/admin/forms/editors" ><span class="title">Editors</span></a></li>
                    <li><a href="/admin/forms/validation" ><span class="title">Form validation</span></a></li>
                    <li><a href="/admin/forms/wizard" ><span class="title">Form wizard</span></a></li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END FORMS -->

            <!-- BEGIN PAGES -->
            <li class="gui-folder hidden">
                <a>
                    <div class="gui-icon"><i class="md md-computer"></i></div>
                    <span class="title">Pages</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Contacts</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/pages/contacts/search" ><span class="title">Search</span></a></li>
                            <li><a href="/admin/pages/contacts/details" ><span class="title">Contact card</span></a></li>
                            <li><a href="/admin/pages/contacts/add" ><span class="title">Insert contact</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Search</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/pages/search/results-text" ><span class="title">Results - Text</span></a></li>
                            <li><a href="/admin/pages/search/results-text-image" ><span class="title">Results - Text and Image</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Blog</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/pages/blog/masonry" ><span class="title">Blog masonry</span></a></li>
                            <li><a href="/admin/pages/blog/list" ><span class="title">Blog list</span></a></li>
                            <li><a href="/admin/pages/blog/post" ><span class="title">Blog post</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Error pages</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="/admin/pages/404" ><span class="title">404 page</span></a></li>
                            <li><a href="/admin/pages/500" ><span class="title">500 page</span></a></li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <li><a href="/admin/pages/profile" ><span class="title">User profile<span class="badge style-accent">42</span></span></a></li>
                    <li><a href="/admin/pages/invoice" ><span class="title">Invoice</span></a></li>
                    <li><a href="/admin/pages/calendar" ><span class="title">Calendar</span></a></li>
                    <li><a href="/admin/pages/pricing" ><span class="title">Pricing</span></a></li>
                    <li><a href="/admin/pages/timeline" ><span class="title">Timeline</span></a></li>
                    <li><a href="/admin/pages/maps" ><span class="title">Maps</span></a></li>
                    <li><a href="/admin/pages/locked" ><span class="title">Lock screen</span></a></li>
                    <li><a href="/admin/pages/login" ><span class="title">Login</span></a></li>
                    <li><a href="/admin/pages/blank" ><span class="title">Blank page</span></a></li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END FORMS -->


        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2017</span> <strong></strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->

