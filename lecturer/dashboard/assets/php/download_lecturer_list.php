<?php
//include database configuration file
include 'database.php';

//get records from database
$cmd = $conn->prepare("SELECT * FROM lecturer ORDER BY name DESC");
$cmd->execute();
$result = $cmd->get_result();
if($result->num_rows > 0){
    $delimiter = ",";
    $filename = "lecturer_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Name', 'Email', 'mobile');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $result->fetch_assoc()){
        $lineData = array($row['name'], $row['email'], $row['mobile']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>