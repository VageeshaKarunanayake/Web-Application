<?php

    include 'database.php';
    require 'email.php';
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    
    if($password != $cpassword)
    {
        echo "PASS MISMATCH";
        exit();
    }
    else
    {
        $hash = md5($password);
    }
    
    
    $stmt = $conn->prepare("INSERT INTO `lecturer`(`name`, `email`, `password`, `mobile`) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$name,$email,$hash,$mobile);
    if($stmt->execute())
    {
        if($stmt->affected_rows > 0)
        {
            if(send_lecturer_registration_success_admin($email,$_POST['password']) == 10)
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