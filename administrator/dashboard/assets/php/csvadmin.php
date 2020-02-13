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
                $name   = $line[0];
                $username  = $line[1];
                $newpass= $line[2];
                $password  = md5($newpass);
                $mobile = $line[2];
                $email = $line[3];
              
                // Check whether member already exists in the database with the same email
                $cmd = $conn->prepare("SELECT * FROM `admin` WHERE email = ?");
                $cmd->bind_param("s",$email);
                $cmd->execute();
                $result = $cmd->get_result();
    if($result->num_rows > 0)
                {    // Update member data in the database
                    $cmd = $conn->prepare("UPDATE admin SET `name`=?, `username`=?, `password`=?, `mobile`=? WHERE email = ?");
                    $cmd->bind_param("sssss",$name,$username,$password,$mobile,$email);
                    $cmd->execute();
                }else{
                    // Insert member data in the database

                $cmd = $conn->prepare("INSERT INTO `admin`(`name`, `username`, `password`, `mobile`, `email`) VALUES (?,?,?,?,?)");
                $cmd->bind_param("sssss",$name,$username,$password,$mobile,$email);
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
}

// Redirect to the listing page
header("Location: ../../manage_administrator.php"."$qstring");