<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aldea | {{$user->name}}</title>

    <!-- Bootstrap core CSS -->

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <!-- switchery -->
    <link href="{{asset('css/switch/bootstrap-switch.css')}}" rel="stylesheet"  />
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


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">

                        <ul class="nav side-menu">
                            <li><a href="{{asset('home')}}"><i class="fa fa-home"></i> Genel Bakış</a>

                            </li>
                            <li><a href="{{asset('temperatures')}}"><i class="fa fa-dashboard"></i> Göstergeler</a>

                            </li>
                            <li><a href="{{asset('temperatures')}}"><i class="fa fa-file-text-o"></i> Raporlar</a>

                            </li>

                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->

                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('images/user.png')}}" alt="">{{$user->name}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li><a href="{{url("logout")}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                <li>
                                    <a>
                                                <span class="image">
                                                    <img src="{{asset('images/img.jpg')}}" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where... 
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                                <span class="image">
                                                    <img src="{{asset('images/img.jpg')}}" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where... 
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                                <span class="image">
                                                    <img src="{{asset('images/img.jpg')}}" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where... 
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                                <span class="image">
                                                    <img src="{{asset('images/img.jpg')}}" alt="Profile Image" />
                                                </span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where... 
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong><a href="inbox.html">See All Alerts</a></strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->


        @yield('content')
    </div>

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
<!-- icheck -->
<script src="{{asset('js/icheck/icheck.min.js')}}"></script>


<!-- daterangepicker -->
<script  src="{{asset('js/moment/moment.min.js')}}"></script>
<script  src="{{asset('js/datepicker/daterangepicker.js')}}"></script>


<script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- tags -->
<script src="{{asset('js/tags/jquery.tagsinput.min.js')}}"></script>

<!-- echart -->
<script src="js/echart/echarts-all.js"></script>
<script src="js/echart/green.js"></script>

<script src="{{asset('js/switch/bootstrap-switch.js')}}"></script>
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
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/pace/pace.min.js')}}" data-pace-options='{ "ajax": false }'></script>
<script src="{{asset('js/melik.js')}}"></script>


<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });


</script>
<!-- /footer content -->
</body>
</html>

