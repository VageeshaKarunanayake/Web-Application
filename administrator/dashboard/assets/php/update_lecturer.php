<?php

    include 'database.php';
    
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $hash = md5($password);
    
    
    $stmt = $conn->prepare("UPDATE `lecturer` SET `name`= ?,`password`= ?,`mobile`= ? WHERE email = ?");
    $stmt->bind_param("ssss",$name,$hash,$mobile,$email);
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