<?php

    include 'database.php';
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    
    
    $password = md5($_POST['password']);
    
    
    $stmt = $conn->prepare("UPDATE `admin` SET `name`= ?,`email`= ?,`password`= ?,`mobile`= ? WHERE username = ?");
    $stmt->bind_param("sssss",$name,$email,$password,$mobile,$id);
    if($stmt->execute())
    {
        if($stmt->affected_rows > 0)
        {
            echo "OK";
        }
    }
    else
    {
        echo "FAIL";//Register Failed
    }

?>