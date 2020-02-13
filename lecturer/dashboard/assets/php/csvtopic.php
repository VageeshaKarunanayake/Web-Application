<?php
// Load the database configuration file
include_once 'database.php';

if(isset($_POST['submit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id   = $line[0];
                $name = $line[1];
                $course = $line[2];
                $description = $line[3];
                $scount = $line[4];
                 
                // Check whether topic already exists in the database with the same id
                $cmd = $conn->prepare("SELECT * FROM `topic` WHERE id = ?");
                $cmd->bind_param("s",$id);
                $cmd->execute();
                $result = $cmd->get_result();
    if($result->num_rows > 0)
                {    // Update member data in the database
                    $cmd = $conn->prepare("UPDATE topic SET `name`=?, `course`=?, `description`=?, `scount`=? WHERE id = ?");
                    $cmd->bind_param("ssssi",$name,$course,$description,$scount,$id);
                    $cmd->execute();
                }else{
                    // Insert member data in the database

                $cmd = $conn->prepare("INSERT INTO `topic`(`id`, `name`, `course`, `description`, `scount`) VALUES (?,?,?,?,?)");
                $cmd->bind_param("ssssi",$id,$name,$course,$description,$scount);
                $cmd->execute();

                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}else{
     $qstring = '?status=err';
}

// Redirect to the listing page
header("Location: ../../managetopics.php"."$qstring");