<?php
    include "assets/php/session.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../dashboard/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../dashboard/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin - Student Managment Portal</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../dashboard/assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    
    <script src="assets/js/dashboard.js"></script>
   
</head>

<body onload="dashboardLoad()">
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../dashboard/assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="./index.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./search.php?filter=students">
                            <i class="nc-icon nc-zoom-split"></i>
                            <p>Search</p>
                        </a>
                    </li>
<!--navigation for manage system users-->
<li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#manageuser">
            <i class="nc-icon nc-app"></i>
            <p>
                Manage Users
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="manageuser">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="./manage_administrator.php">
                        <span class="sidebar-mini">MA</span>
                        <span class="sidebar-normal">Manage Administrator</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./manage_lecturer.php">
                        <span class="sidebar-mini">ML</span>
                        <span class="sidebar-normal">Manage Lecturer</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
<!--navigation for manage students-->
                    <li class="nav-item ">
                        <a class="nav-link" href="./manage_student.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Manage Students</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="./index.php"> Dashboard </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="nav navbar-nav mr-auto">
                           
                        </ul>
                        <ul class="navbar-nav">
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bullet-list-67"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                   
                                    <a href="logout.php" class="dropdown-item text-danger">
                                        <i class="nc-icon nc-button-power"></i> Log out
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-notes text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Administrator Count</p>
                                                <h4 class="card-title" id="administrators_count">0</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-refresh"></i> Update Now
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-single-02 text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Lecturers Count</p>
                                                <h4 class="card-title" id="lecturers_count">0</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-calendar-o"></i> Last day
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-icon nc-app text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Regular Students</p>
                                                <h4 class="card-title" id="regular_students">0</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> In the last hour
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-circle text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="numbers">
                                                <p class="card-category">Pro-Rata Students</p>
                                                <h4 class="card-title" id="prorata_students">0</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-refresh"></i> Update now
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>                                  
                </div>
            </div>
        </div>
            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="https://www.apweslk.com">Apweslk Solutions</a>, made for SLIIT
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../dashboard/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../dashboard/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../dashboard/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../dashboard/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../dashboard/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../dashboard/assets/js/plugins/bootstrap-notify.js"></script>
<!--  jVector Map  -->
<script src="../dashboard/assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../dashboard/assets/js/plugins/moment.min.js"></script>
<!--  DatetimePicker   -->
<script src="../dashboard/assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  Sweet Alert  -->
<script src="../dashboard/assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="../dashboard/assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
<!--  Sliders  -->
<script src="../dashboard/assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="../dashboard/assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="../dashboard/assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../dashboard/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Bootstrap Table Plugin -->
<script src="../dashboard/assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="../dashboard/assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<script src="../dashboard/assets/js/plugins/fullcalendar.min.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../dashboard/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="../dashboard/assets/js/demo.js"></script>

</html>
