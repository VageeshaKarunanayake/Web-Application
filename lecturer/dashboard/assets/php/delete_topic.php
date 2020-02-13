<?php

    include 'database.php';
    
    $id = $_POST['id'];
    
    $cmd = $conn->prepare("DELETE FROM topic WHERE id = ?");
    $cmd->bind_param("s",$id);
    $cmd->execute();
    if($cmd->affected_rows > 0)
    {
        echo "OK";
    }
    else
    {
        echo "FAIL";
    }
    
    