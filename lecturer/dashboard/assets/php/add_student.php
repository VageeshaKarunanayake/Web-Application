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
        $stmt = $conn->prepare("INSERT INTO student( id, name, mobile, email, password, year, semester, prorata , gpa) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ? )");
        $stmt->bind_param("sssssiiid",$id,$name,$mobile,$email,$password,$year,$semester,$prorata,$gpa);
        if($stmt->execute())
        {
            send_student_registration_success_admin($email,$mobile);
            //Catch 10 For Success
        }
        else
        {
            echo 3;//Register Failed
        }
    }

?>