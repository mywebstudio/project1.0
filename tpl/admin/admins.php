<head>
    <title>Material Admin - Dynamic tables</title>

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
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/libs/DataTables/jquery.dataTables.css?1423553989" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
    <link type="text/css" rel="stylesheet" href="/i/css/admin-theme/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/i/js/admin-theme/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="/i/js/admin-theme/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
</head>
<!-- BEGIN CONTENT-->
<div id="content">
    <!-- BEGIN INTRO -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-primary">Список администраторов</h1>
        </div><!--end .col -->
        <div class="col-lg-8">
            <article class="margin-bottom-xxl">
                <p class="lead">
                    <a  href="/admin/admin" class="btn ink-reaction btn-raised btn-primary">Добавить</a>
                </p>
            </article>
        </div><!--end .col -->
    </div><!--end .row -->
    <!-- END INTRO -->

    <section class="style-default-bright">
        <div class="section-header">
            <h2 class="text-primary">Все администраторы</h2>

        </div>
        <div class="section-body">

            <!-- BEGIN DATATABLE 2 -->
            <div class="row">
                <div class="col-md-12">
                    <h4></h4>
                </div><!--end .col -->
                <div class="col-lg-12">
                    <div class="table table-hover">
                        <table id="datatable2" class="table order-column hover" data-source="/processorModule/admins/admins?login=<?=$_COOKIE['auto_admin_auth_login']?>&hash=<?=$_COOKIE['auto_admin_auth_pwd_hash']?>" data-swftools="/i/js/admin-theme/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf">
                            <thead>
                            <tr>
                                <th></th>
                                <th>id</th>
                                <th>Логин</th>
                                <th>Имя</th>
                                <th>email</th>
                                <th>Телефон</th>
                                <th>Описание</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!--end .table-responsive -->
                </div><!--end .col -->
            </div><!--end .row -->
            <!-- END DATATABLE 2 -->

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
<script src="/i/js/admin-theme/libs/DataTables/jquery.dataTables.min.js"></script>
<script src="/i/js/admin-theme/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
<script src="/i/js/admin-theme/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="/i/js/admin-theme/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="/i/js/admin-theme/core/source/App.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavigation.js"></script>
<script src="/i/js/admin-theme/core/source/AppOffcanvas.js"></script>
<script src="/i/js/admin-theme/core/source/AppCard.js"></script>
<script src="/i/js/admin-theme/core/source/AppForm.js"></script>
<script src="/i/js/admin-theme/core/source/AppNavSearch.js"></script>
<script src="/i/js/admin-theme/core/source/AppVendor.js"></script>
<script src="/i/js/admin-theme/core/demo/Demo.js"></script>
<script>
    (function(namespace, $) {
        "use strict";

        var DemoTableDynamic = function() {
            // Create reference to this instance
            var o = this;
            // Initialize app when document is ready
            $(document).ready(function() {
                o.initialize();
            });

        };
        var p = DemoTableDynamic.prototype;

        // =========================================================================
        // INIT
        // =========================================================================

        p.initialize = function() {
            this._initDataTables();
        };

        // =========================================================================
        // DATATABLES
        // =========================================================================

        p._initDataTables = function() {
            if (!$.isFunction($.fn.dataTable)) {
                return;
            }

            // Init the demo DataTables

            this._createDataTable2();
        };



        p._createDataTable2 = function() {
            var table = $('#datatable2').DataTable({
                "dom": 'T<"clear">lfrtip',

                "ajax": $('#datatable2').data('source'),
                "columns": [
                    {
                        "class": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },

                    {"data": "id"},
                    {"data": "login"},
                    {"data": "title"},
                    {"data": "email"},
                    {"data": "phone"},
                    {"data": "desc"}
                ],
                "tableTools": {
                    "sSwfPath": $('#datatable2').data('swftools')
                },
                "order": [[1, 'asc']],
                "colVis": {
                    "buttonText": "Columns",
                    "overlayFade": 0,
                    "align": "left"
                },
                "language": {
                    "lengthMenu": '_MENU_ entries per page',
                    "search": '<i class="fa fa-search"></i>',
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>'
                    }
                }
            });

            //Add event listener for opening and closing details
            var o = this;
            $('#datatable2 tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child(o._formatDetails(row.data())).show();
                    tr.addClass('shown');
                }
            });
        };

        // =========================================================================
        // DETAILS
        // =========================================================================

        p._formatDetails = function(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>Full name:</td>' +
                '<td>' + d.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extension number:</td>' +
                '<td>' + d.extn + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Extra info:</td>' +
                '<td><a href="/admin/admin?id=' + d.id + '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></a>' +
                '<a href="/admin/admin?id=' + d.id + '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Copy row"><i class="fa fa-copy"></i></a>' +
                '<a href="/admin/admin?del=' + d.id + '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete row"><i class="fa fa-trash-o"></i></a>' +
                '</td>' +
                '</tr>' +
                '</table>';
        };

        // =========================================================================
        namespace.DemoTableDynamic = new DemoTableDynamic;
    }(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

</script>
<!-- END JAVASCRIPT -->
