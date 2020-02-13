<?php
//include database configuration file
include 'database.php';
$id=$_GET['mod'];
//get records from db
$cmd = $conn->prepare("SELECT * FROM groups WHERE course = '$id'  AND prorata = '0'");
$cmd->execute();
$result = $cmd->get_result();
if($result->num_rows > 0){
    $delimiter = ",";
    $filename = "groups_regular" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');
    
$cmdth = $conn->prepare("SELECT * FROM groups WHERE course = '$id'  AND prorata = '0'");
$cmdth->execute();
$resultt = $cmdth->get_result();
 while($rowt = $resultt->fetch_assoc()){
        $year=$rowt['year'];
        $sem=$rowt['semester'];
        
 }
    
    $fields = array('Year:-',$year,);
    fputcsv($f, $fields, $delimiter);
     $fields = array('Semester:-',$sem,);
    fputcsv($f, $fields, $delimiter);
     $fields = array('Module:-',$id,);
    fputcsv($f, $fields, $delimiter);
    $students=array();
    
    //set column headers
    $fields = array('Id','Name', 'student_count', 'Student_list');
    fputcsv($f, $fields, $delimiter);
    $students=array();
    //output each row of the data, format line as csv and write to file pointer
    while($row = $result->fetch_assoc()){
        $gid=$row['id'];
$cmdt = $conn->prepare("SELECT * FROM groups_students WHERE gid = '$gid'");
$cmdt->execute();
$results = $cmdt->get_result();
 while($rows = $results->fetch_assoc()){
        $students[]=$rows['sid'];
        
 
 $sdata=implode("\n", $students); 
        $lineData = array($row['id'], $row['name'], $row['student_count'],$sdata);
}
        fputcsv($f, $lineData, $delimiter);
   $students=array();
 
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
    exit;
}
header('Location: ../../reports.php?error=empty');


?>