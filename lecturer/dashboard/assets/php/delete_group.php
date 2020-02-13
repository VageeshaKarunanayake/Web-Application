<?php

    include 'database.php';
    
    $id = $_POST['id'];
    
    $cmd = $conn->prepare("DELETE FROM groups WHERE id = ?");
    $cmd->bind_param("s",$id);
    $cmd->execute();
    if($cmd->affected_rows > 0)
    {
        $cmd = $conn->prepare("DELETE FROM groups_students WHERE gid = ?");
        $cmd->bind_param("s",$id);
        $cmd->execute();
        echo "OK";
    }
    else
    {
        echo "FAIL";
    }
    
    