<?php
    include 'assets/php/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Lecturer - Student Managment Portal</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <script src="assets/js/getModule_GroupID_Students_Topics_Prorata.js"></script>
    <script src="assets/js/topic_allocation_prorata.js"></script>
    <script src="assets/js/viewTopicsProrata.js"></script>
    <script src="assets/js/updateTopicProrata.js"></script>
    <script src="assets/js/viewTopicsAllProrata.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   
</head>

<body onload="onStart()">
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="./assets/img/sidebar-5.jpg">
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
<!--navigation for manage modules-->
<li class="nav-item ">
    <a class="nav-link" href="./managemodules.php">
        <i class="nc-icon nc-single-copy-04"></i>
        <p>Manage Modules</p>
    </a>
</li>
<!--navigation for manage topics-->
<li class="nav-item ">
    <a class="nav-link" href="./managetopics.php">
        <i class="nc-icon nc-ruler-pencil"></i>
        <p>Manage Topics</p>
    </a>
</li>
<!--navigation for manage Regular Student grouping-->
<li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#regulargrouping">
            <i class="nc-icon nc-app"></i>
            <p>
                Regular grouping
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="regulargrouping">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="./manualRGrouping.php">
                        <span class="sidebar-mini">MRG</span>
                        <span class="sidebar-normal">Manual Student grouping</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./autoRGrouping.php">
                        <span class="sidebar-mini">ARG</span>
                        <span class="sidebar-normal">Automatic Student grouping</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <!-- navigation for manage prorata student grouping -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#proratagrouping">
            <i class="nc-icon nc-circle"></i>
            <p>
                Pro-Rata grouping
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="proratagrouping">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="./manualPGrouping.php">
                        <span class="sidebar-mini">MPG</span>
                        <span class="sidebar-normal">Manual Student grouping</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./autoPGrouping.php">
                        <span class="sidebar-mini">APG</span>
                        <span class="sidebar-normal">Automatic Student grouping</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <!-- navigation for manage regualar student topic -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#Regulartopic">
            <i class="nc-icon nc-app"></i>
            <p>
                Regular Topic Select
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="Regulartopic">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="./manualRTSelect.php">
                        <span class="sidebar-mini">MTS</span>
                        <span class="sidebar-normal">Manual Topic selection</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./autoRTSelect.php">
                        <span class="sidebar-mini">ATS</span>
                        <span class="sidebar-normal">Automatic Topic selection</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <!-- navigation for manage prorata student topic selection -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#prorataTopic">
            <i class="nc-icon nc-circle"></i>
            <p>
                Pro-Rata Topic Select
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse " id="prorataTopic">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="./manualPTSelect.php">
                        <span class="sidebar-mini">MTS</span>
                        <span class="sidebar-normal">Manual Topic Selection</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./autoPTSelect.php">
                        <span class="sidebar-mini">ATS</span>
                        <span class="sidebar-normal">Automatic Topic Selection</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

<!--navigation for reports-->
                    <li class="nav-item ">
                        <a class="nav-link" href="./reports.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Reports</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
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
                        <a class="navbar-brand" href="./index.php"> Manual Pro-Rata Topic Selection </a>
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
                            <div class="col-md-12">
                                <form id="addTopic" action="" method="">
                                <div class="card bootstrap-table">
                                    <div class="card-body table-full-width">
                                        <div class="toolbar">
                                           
                                        </div>
                                        <!--search drop downs filter year and semestrer-->
                            <div class="card-header has-label">
                                    <label>
                                       Year
                                    </label>
                                    <select name="year" class="selectpicker" onchange="moduleLoad()" id="year" data-title="Select Year" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                            <option value="1">Year 1</option>
                                            <option value="2">Year 2</option>
                                            <option value="3">Year 3</option>
                                            <option value="4">Year 4</option>
                                    </select>
                                </div>

                                <div class="card-header has-label">
                                        <label>
                                          Semester
                                        </label>
                                        <select name="Semester" class="selectpicker" onchange="moduleLoad()" id="semester" data-title="Select Semester" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                <option value="1">Semester 1</option>
                                                <option value="2">Semester 2</option>
                                        </select>
                                    </div>
                                    <div class="card-header has-label">
                                        <label>
                                          Module
                                        </label>
                                        <select name="Semester" class="selectpicker" onchange="ID_topic()" id="module" data-title="Select Module" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                        </select>
                                    </div>
                                    <div class="card-header has-label">
                                        <label>
                                          Group
                                        </label>
                                        <select name="Semester" class="selectpicker" id="group" data-title="Select Group" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">

                                        </select>
                                    </div>
                                    <div class="card-header has-label">
                                        <label>
                                          Topic
                                        </label>
                                        <select name="Semester" class="selectpicker" id="topic" data-title="Select Topic" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">

                                        </select>
                                    </div>
                                    <br>
                                    <div class="card-footer text-right">
                                    <button type="button" class="btn btn-info btn-fill pull-right" onclick="topic_allocation()">Allocate Topic</button>
                                    </div>
                                    
 
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="card table-with-links">
                                <div class="card-header ">
                                    <h4 class="card-title">Details of Topic Allocations</h4>
                                </div>
                                <div class="card-body table-full-width">
                                    <!--search drop downs filter year and semestrer-->
                                <div class="card-header has-label">
                                        <label>
                                           Year
                                        </label>
                                        <select name="year" class="selectpicker" id="year2" onchange="moduleLoad2()" data-title="Select Year" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                <option value="1">Year 1</option>
                                                <option value="2">Year 2</option>
                                                <option value="3">Year 3</option>
                                                <option value="4">Year 4</option>
                                        </select>
                                    </div>
    
                                    <div class="card-header has-label">
                                            <label>
                                              Semester
                                            </label>
                                            <select name="Semester" class="selectpicker" id="semester2" onchange="moduleLoad2()" data-title="Select Semester" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                    <option value="1">Semester 1</option>
                                                    <option value="2">Semester 2</option>
                                            </select>
                                        </div>
    
                                        <div class="card-header has-label">
                                            <label>
                                              Module
                                            </label>
                                            <select name="Semester" class="selectpicker" id="MC2" onchange="viewTopics()" data-title="Select Module" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                            </select>
                                        </div>
    
                                        <!--end of filter-->
                                    <table class="table" id="VTTABLE">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Group ID</th>
                                                <th>Group Name</th>
                                                <th>Topic ID</th>
                                                <th class="text-right">Topic Name</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                              <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="updateTopic" action="" method="">
                                <div class="card bootstrap-table">
                                    <div class="card-body table-full-width">
                                        <div class="card-header ">
                                            <h4 class="card-title">Update Topic</h4>
                                        </div>
                                        <div class="toolbar">
                                           
                                        </div>
                                        <!--search drop downs filter year and semestrer-->
                            <div class="card-header has-label">
                                    <label>
                                       Year
                                    </label>
                                    <input class="form-control" name="year" id="year3" type="text" required="true" disabled="disabled" />
                                </div>

                                <div class="card-header has-label">
                                        <label>
                                          Semester
                                        </label>
                                        <input class="form-control" name="semester" id="semester3" type="text" required="true" disabled="disabled" />
                                    </div>
                                    <div class="card-header has-label">
                                        <label>
                                          Module
                                        </label>
                                        <input class="form-control" name="module" id="MC3" type="text" required="true" disabled="disabled" />
                                    </div>
                                    <div class="card-header has-label">
                                        <label>
                                          Group
                                        </label>
                                        <input class="form-control" name="groupName" id="groupName3" type="text" required="true" disabled="disabled" />
                                    </div>
                                    <div class="card-header has-label">
                                        <label>
                                          Topic
                                        </label>
                                        <select name="Semester" class="selectpicker" id="topic3" data-title="Select Topic" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">

                                        </select>
                                    </div>
                                    <br>
                                    <div class="card-footer text-right">
                                    <button type="button" class="btn btn-info btn-fill pull-right" onclick="update_topic_allocation()">Update Allocated topic</button>
                                    </div>
                                    <!--end of filter-->
 
                                    </div>
                                </div>
                                </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
              </div>
            </div>
            <!-- end model -->
                    </div>
    
                <footer class="footer">
                    <div class="container">
                        <nav>
                            <ul class="footer-menu">
                                
                            </ul>
                            <p class="copyright text-center">
                                ©
                                <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                    <a href="#">Sri Lanka Institute of Information Technology</a>
                            </p>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>

    </body>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="./assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!--  jVector Map  -->
<script src="./assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="./assets/js/plugins/moment.min.js"></script>
<!--  DatetimePicker   -->
<script src="./assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  Sweet Alert  -->
<!-- <script src="./assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
  Tags Input  -->
<script src="./assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
<!--  Sliders  -->
<script src="./assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="./assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="./assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="./assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Bootstrap Table Plugin -->
<script src="./assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="./assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<script src="./assets/js/plugins/fullcalendar.min.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="./assets/js/demo.js"></script>
<script type="text/javascript">
    var $table = $('#bootstrap-table');

    function operateFormatter(value, row, index) {
        return [
            '<a rel="tooltip" title="View" class="btn btn-link btn-info table-action view" href="javascript:void(0)">',
            '<i class="fa fa-image"></i>',
            '</a>',
            '<a rel="tooltip" title="Edit" class="btn btn-link btn-warning table-action edit" href="javascript:void(0)">',
            '<i class="fa fa-edit"></i>',
            '</a>',
            '<a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
            '<i class="fa fa-remove"></i>',
            '</a>'
        ].join('');
    }

    $().ready(function() {
        

        $table.bootstrapTable({
            toolbar: ".toolbar",
            clickToSelect: true,
            showRefresh: true,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            searchAlign: 'left',
            pageSize: 8,
            clickToSelect: false,
            pageList: [8, 10, 25, 50, 100],

            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        //activate the tooltips after the data table is initialized
        $('[rel="tooltip"]').tooltip();

        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });


    });
</script>

</html>
