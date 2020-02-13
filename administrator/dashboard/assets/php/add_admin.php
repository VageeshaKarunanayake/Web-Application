<?php

    include 'database.php';
    require 'email.php';
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    
    $stmt = $conn->prepare("INSERT INTO `admin`(`name`, `username`, `password`, `mobile`, `email`) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$name,$id,$password,$mobile,$email);
    if($stmt->execute())
    {
        if($stmt->affected_rows > 0)
        {
            if(send_admin_registration_success_admin($email ,$id, $_POST['password']) == 10)
            {
                echo "OK";
            }
            
        }
    }
    else
    {
        echo "FAIL";//Register Failed
    }

?>