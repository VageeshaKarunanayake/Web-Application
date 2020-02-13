<?php

    include 'database.php';
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $module = $_POST['module'];
    
    $cmd = $conn->prepare("UPDATE `topic` SET `name`= ?,`course`= ?,`description`= ? WHERE id = ?");
    $cmd->bind_param("ssss",$name,$module,$description,$id);
    $cmd->execute();
    if($cmd->affected_rows > 0)
    {
        echo "OK";
    }
    else
    {
        echo mysqli_error($conn);
    }
    