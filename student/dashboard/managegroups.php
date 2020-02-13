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
    <title>Student - Student Managment Portal</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    
    
    <script src="assets/js/modalview.js"></script>
    <script src="assets/js/viewgroup.js"></script>
    <script src="assets/js/updategroup.js"></script>
    <script src="assets/js/dataloads.js"></script>
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
                    
<!--navigation for manage modules-->
<li class="nav-item ">
    <a class="nav-link" href="./managegroups.php">
        <i class="nc-icon nc-single-copy-04"></i>
        <p>Create Groups</p>
    </a>
</li>
<!--navigation for manage topics-->
<!--<li class="nav-item ">
    <a class="nav-link" href="./managetopics.php">
        <i class="nc-icon nc-ruler-pencil"></i>
        <p>Manage Topics</p>
    </a>
</li>
<!--navigation for manage Regular Student grouping
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
                    <a class="nav-link" href="./manualRGrouping.html">
                        <span class="sidebar-mini">MRG</span>
                        <span class="sidebar-normal">Manual Student grouping</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./autoRGrouping.html">
                        <span class="sidebar-mini">ARG</span>
                        <span class="sidebar-normal">Automatic Student grouping</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <!-- navigation for manage prorata student grouping 
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
                    <a class="nav-link" href="./manualPGrouping.html">
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

    <!-- navigation for manage regualar student topic 
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
                    <a class="nav-link" href="./manualRTSelect.html">
                        <span class="sidebar-mini">MTS</span>
                        <span class="sidebar-normal">Manual Topic selection</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./autoRTSelect.html">
                        <span class="sidebar-mini">ATS</span>
                        <span class="sidebar-normal">Automatic Topic selection</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <!-- navigation for manage prorata student topic selection 
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
                    <a class="nav-link" href="./manualPTSelect.html">
                        <span class="sidebar-mini">MTS</span>
                        <span class="sidebar-normal">Manual Topic Selection</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./autoPTSelect.html">
                        <span class="sidebar-mini">ATS</span>
                        <span class="sidebar-normal">Automatic Topic Selection</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

<!--navigation for reports-->
                    

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
                        <a class="navbar-brand" href="./index.php"> Manage Groups </a>
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
                            <li class="dropdown nav-item">
                                
                                
                            </li>
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
                                <?php
                        if($_GET['status']=='succ'){
                            echo "<div class='alert alert-success'>
 Group creation successful
</div>";
}elseif($_GET['status']=='err'){
    echo "<div class='alert alert-warning'>
   Group creation unsuccessful.Please try again
</div>";
}
                                require('../assets/php/database.php');
                                 $stmt = $conn->prepare("SELECT * FROM `group_leader` WHERE lid = ?");
                                 $stmt->bind_param("s",$username);
                                 $stmt->execute();
                                 $result = $stmt->get_result();
                                 $row = $result->fetch_assoc();
                                 if($result->num_rows > 0)
	                           {
	                            $hid="hidden";
	                           }
                                ?>
                                
                                <form id="addGroup" method="POST" action="assets/php/add_group.php" enctype="multipart/form-data" <?php echo "$hid"; ?>>
                                    <div class="card ">
                                        <div class="card-header ">
                                            <h4 class="card-title">Add Group</h4>
                                        </div>
                                        <div class="card-body ">
                                          
                                            <div class="form-group has-label">
                                                    <label>
                                                       Group Type
                                                        <star class="star">*</star>
                                                    </label>
                                                    <select name="gtype"  class="selectpicker" required="true" id="gtype" data-title="Select regular or pro-rata" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                            <option value="0">Regular</option>
                                                            <option value="1">Pro-Rata</option>
                                                            
                                                    </select>
                                                </div>
                                            
                                          
                                                  <?php
                                            $stmt = $conn->prepare("SELECT * FROM `student` WHERE id = ?");
                                            $stmt->bind_param("s",$username);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $row = $result->fetch_assoc();
                                            $name=$row['name'];
                                            $phone=$row['mobile'];
                                            $year = $row['year'];
                                            $semester = $row['semester'];

                                            ?> 
                                            <div class="form-group has-label">
                                                    <label>
                                                       Leader
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control"  name="leaders" id="leaders" type="text" value="<?php echo $name;?>" readonly="readonly"/>
                                                    <input class="form-control"  name="leader" id="leader" type="hidden" value="<?php echo $username;?>"/>
                                                    
                                                </div>
                                               <div class="form-group has-label">
                                                  
                                                    <label>
                                                       Module
                                                        <star class="star">*</star>
                                                    </label>
                                                    <select  name="modle" class="selectpicker" id="modle"  onchange="gid();" data-title="Select Module" required="true" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                      <?php
                                                   $cmd= $conn->prepare("SELECT * FROM course WHERE year = ? AND semester = ?");
			                                       $cmd->bind_param("ii",$year,$semester);
			                                       $cmd->execute();
                                                   $results = $cmd->get_result();
                                                   while($rows = $results->fetch_assoc()){
                                                        $id = $rows['id'];
                                                         $name = $rows['name'];
                                                       echo "<option value = ".$id."> ".$name." </option>";
                                                   }      
                                                     ?>       
                                                            
                                                    </select>
                                                </div>
                                            <div class="form-group has-label">
                                                    <label>
                                                        Contact No
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="contact" id="contact" value="<?php echo $phone;?>" type="text"  />
                                                </div>
                                                <div class="form-group has-label">
                                                <label>
                                                        Year
                                                        <star class="star">*</star>
                                                    </label>
                                               <input class="form-control" disasbled="true" name="year" id="lyear" value="<?php echo $year;?>" type="text" readonly="readonly"/>
                                            </div>
                                        <div class="form-group has-label">
                                                <label>
                                                        Semester
                                                        <star class="star">*</star>
                                                    </label>
                                               <input class="form-control" disasbled="true" name="semester" value="<?php echo $semester;?>" id="lsems" type="text" readonly="readonly"/>
                                            </div>
                                                  <div class="form-group has-label">
                                                    <label>
                                                        Group ID
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="groupid" id="groupid" type="text" readonly="readonly"/>
                                                </div>
                                                
                                            <div class="form-group has-label">
                                                    <label>
                                                        Group member count (Excluding You)
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control"  name="memcount" min="1" value="1" id="memcount" onchange="restrict();" type="number"  />
                                                </div>
                                            <div class="form-group has-label">
                                                        <label>
                                                            Select Other Members for your Group
                                                            <star class="star">*</star>
                                                        </label>
                                                        <select multiple data-title="Select Members" name="members[]" id="member" class="selectpicker" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                            <?php
                                            require('../assets/php/database.php');
                                           $stmt = $conn->query("SELECT * FROM student LEFT JOIN groups_students ON student.id = groups_students.sid  WHERE groups_students.sid IS NULL AND student.id != '$username' AND student.year = '$year' AND student.semester = '$semester'");
                                            while ($row = $stmt->fetch_assoc()) {
                                                # code...
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $count=$result->num_rows;
                                            /*$stmt2 = $conn->prepare("SELECT * FROM groups_students WHERE sid = ?");
                                            $stmt2->execute();
                                            $result2 = $stmt2->get_result();
                                            if($result2->num_rows > 0){
                                            while ($row2 = mysqli_fetch_array($result2)) {                
    echo "<option value = test'> 'test' </option>";
                                           }}else{*/
                                            echo "<option value = ".$id."> ".$name." </option>";
                                           }
                                            ?> 
                                                     
                                                        </select>
                                                </div>     
                                            <div class="card-category form-category">
                                                <star class="star">*</star> Required fields</div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit"  name="submit" id="submit" class="btn btn-info btn-fill pull-right" >Register</button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            
           
            <!--end of register form-->
            <!-- start table view-->
            <div class="col-md-12">
                    <div class="card table-with-links">
                            <div class="card-header ">
                                <h4 class="card-title">Group Details</h4>
                            </div>
                            <div class="card-body table-full-width">
                                <!--search drop downs filter year and semestrer-->
                           <!-- <div class="card-header has-label">
                                    <label>
                                       Year
                                    </label>
                                    <select name="year" class="selectpicker" onchange="viewModules()" onchange="" id="year2" data-title="Select Year" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
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
                                        <select name="Semester" class="selectpicker" onchange="viewModules()"  id="semester2" data-title="Select Semester" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                <option value="1">Semester 1</option>
                                                <option value="2">Semester 2</option>
                                        </select>
                                    </div>
-->
                                    <!--end of filter-->
                                <table class="table" id="MOTABLE">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Group ID</th>
                                            <th>Group Name</th>
                                            <th class="text-right">Year</th>
                                            <th class="text-right">Semester</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
                        <form id="updateGroup" action="assets/php/update_group_students_by_id.php" method="POST">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Update Group</h4>
                                            </div>
                                            <div class="card-body ">
                                                <div class="form-group has-label">
                                                        <label>
                                                            Year
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="year" id="year3" type="text" required="true" readonly/>
                                                    </div>
                                            <div class="form-group has-label">
                                                       
                                                        <input class="form-control" name="id3" id="id3" type="hidden" required="true" readonly/>
                                                    </div>
                                            <div class="form-group has-label">
                                                    <label>
                                                        Semester
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="semester" id="semester3" type="text" required="true" readonly/>
                                            </div>
                                            <div class="form-group has-label">
                                                    <label>
                                                        Module Code
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="module" id="MC3" type="text" required="true" readonly/>
                                                </div>
                                                <div class="form-group has-label">
                                                        <label>
                                                            Group Name
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="groupName" id="groupName3" type="text" required="true" readonly/>
                                                    </div>
    
                                                <div class="form-group has-label">
                                                        <label>
                                                            No of Members(Excluding you)
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="memCount" id="memCount3" type="number" min="2" onclick="restrict1();" required="true" />
                                                    </div>
                                                <div class="form-group has-label">
                                                        <label>
                                                            Select Other Members for your Group
                                                            <star class="star">*</star>
                                                        </label>
                                                        <select multiple data-title="Select Members" name="members3[]" id="members3" class="selectpicker" data-style="btn-default btn-outline" data-menu-style="dropdown-blue">
                                                                
                                                        </select>
                                                </div>
                                                
                                                
                                                <div class="card-category form-category">
                                                    <star class="star">*</star> Required fields</div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button type="submit" class="btn btn-info btn-fill pull-right">Update Group</button>
                                                <div class="clearfix"></div>
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
                            <!-- Modal -->
             <div class="modal fade" id="myModalview" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="updateGroup" action="assets/php/update_group_students_by_id.php" method="POST">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <h4 class="card-title">View Group</h4>
                                            </div>
                                            <div class="card-body ">
                                                <div class="form-group has-label">
                                                        <label>
                                                            Year
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="year4" id="year4" type="text" required="true" readonly/>
                                                    </div>
                                            <div class="form-group has-label">
                                                       
                                                        <input class="form-control" name="id4" id="id4" type="hidden" required="true" readonly/>
                                                    </div>
                                            <div class="form-group has-label">
                                                    <label>
                                                        Semester
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="semester4" id="semester4" type="text" required="true" readonly/>
                                            </div>
                                            <div class="form-group has-label">
                                                    <label>
                                                        Module Code
                                                        <star class="star">*</star>
                                                    </label>
                                                    <input class="form-control" name="module4" id="MC4" type="text" required="true" readonly/>
                                                </div>
                                                <div class="form-group has-label">
                                                        <label>
                                                            Group Name
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="groupName4" id="groupName4" type="text" required="true" readonly/>
                                                    </div>
    
                                                <div class="form-group has-label">
                                                        <label>
                                                            No of Members
                                                            <star class="star">*</star>
                                                        </label>
                                                        <input class="form-control" name="memCount4" id="memCount4" type="number" min="2" required="true" readonly/>
                                                    </div>
                                                 
                                                  <div class="form-group has-label">
                                                       <label>
                                                             Members
                                                        </label>
                                                  <table class="table" id="SHOWTABLE">
                                        <thead>
                                            
                                            <tr>
                                                <th class="text-left">ID</th>
                                                <th class="text-Center">Name</th>
                                            </tr>
                                        
                                        <tbody>
                                            <tr>
                                                
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                    </div>
                                                
                                                
                                                
                                            <div class="card-footer text-right">
                                                <button type="button" class="btn btn-info btn-fill pull-right" data-dismiss="modal">OKAY</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                    </div>
                    
                </div>
                </div>
              </div>
            </div>
            </div>

            <!--end of copy-->
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
<!--  Sweet Alert -->
<script src="./assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
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
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="./assets/js/demo.js"></script>


<script type="text/javascript">
function restrict()
{
     
    var sVal = $('#memcount').val();
    var iNum = parseInt(sVal);
    $('.selectpicker').selectpicker({
  maxOptions:iNum });
 $('#member').selectpicker('val', '');
}

function restrict1()
{
     
    var sVal = $('#memCount3').val();
    var iNum = parseInt(sVal);
    $('.selectpicker').selectpicker({
    maxOptions:iNum });
    $('#members3').selectpicker('val', '');
}
</script>
</html>
