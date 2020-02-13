<?php
//include database configuration file
include 'database.php';
$id=$_GET['mod'];
//get records from db
$cmd = $conn->prepare("SELECT student.id AS stuid, student.name AS stuname, student.mobile, student.email, student.year, student.semester, student.prorata, student.gpa, groups_students.gid, groups_students.sid, groups.name, groups.course, course.name AS cname FROM (((student INNER JOIN groups_students ON student.id = groups_students.sid)INNER JOIN groups ON groups_students.gid = groups.id)INNER JOIN course ON groups.course = course.id) WHERE course.id = '$id' AND student.prorata = '1'");
$cmd->execute();
$result = $cmd->get_result();
if($result->num_rows > 0){
    $delimiter = ",";
    $filename = "prostudents_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Id','Name', 'Mobile', 'Email', 'Year', 'Semester', 'Prorata', 'Gpa', 'Course_name');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $result->fetch_assoc()){
        $lineData = array($row['stuid'], $row['stuname'], $row['mobile'], $row['email'], $row['year'], $row['semester'], $row['prorata'], $row['gpa'], $row['cname']);
        fputcsv($f, $lineData, $delimiter);
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