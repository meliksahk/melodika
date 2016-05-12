<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laradmin | Larashop Admin Panel</title>

    <!-- Bootstrap core CSS -->

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <!-- switchery -->
    <link href="{{asset('css/switchery/switchery.min.css')}}" rel="stylesheet"  />
    <!-- Custom styling plus plugins -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/icheck/flat/green.css')}}" rel="stylesheet">
    <link href="{{asset('css/datatables/tools/css/dataTables.tableTools.css')}}" rel="stylesheet">

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">



        @yield('content')


</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- chart js -->
<script src="{{asset('js/chartjs/chart.min.js')}}"></script>
<!-- bootstrap progress js -->
<script src="{{asset('js/progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('js/nicescroll/jquery.nicescroll.min.js')}}"></script>
<!-- icheck -->
<script src="{{asset('js/icheck/icheck.min.js')}}"></script>
<!-- switchery -->
<script src="{{asset('js/switchery/switchery.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- daterangepicker -->
<script  src="{{asset('js/moment/moment.min.js')}}"></script>
<script  src="{{asset('js/datepicker/daterangepicker.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('js/datatables/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/datatables/tools/js/dataTables.tableTools.js')}}"></script>

<script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>

<!--flot-->
<script src="{{asset('js/flot/jquery.flot.js')}}"></script>
<script src="{{asset('js/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('js/flot/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('js/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{asset('js/flot/date.js')}}"></script>
<script src="{{asset('js/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('js/flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('js/flot/curvedLines.js')}}"></script>
<script src="{{asset('js/flot/jquery.flot.resize.js')}}"></script>

<script src="{{asset('js/pace/pace.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        var oTable = $('#example').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "{{asset('js/Datatables/tools/swf/copy_csv_xls_pdf.swf')}}"
            }
        });
        $("tfoot input").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function () {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function (i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>
<!-- /footer content -->
</body>
</html>

