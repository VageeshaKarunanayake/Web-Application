<?php

    include 'database.php';
    require 'email.php';
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $prorata = $_POST['prorata'];
    $gpa = $_POST['gpa'];
    if((isset($id)) && (isset($name)) && (isset($mobile)) && (isset($email)) && (isset($year)) && (isset($semester)) == false )
    {
        echo 1; //Not Enough Data
    }
    else
    {
        $password = md5($mobile);
        $stmt = $conn->prepare("UPDATE `student` SET `name`= ?,`mobile`= ?,`email`= ?,`year`= ?,`semester`= ?,`prorata`= ?,`password`= ? , `gpa` = ? WHERE id = ?");
        $stmt->bind_param("sssiiisds",$name,$mobile,$email,$year,$semester,$prorata,$password,$gpa,$id);
        if($stmt->execute())
        {
            //send_student_registration_success_admin($email,$mobile);
            //Catch 10 For Success
            echo "OK";
        }
        else
        {
            echo 3;//Register Failed
        }
    }

?>