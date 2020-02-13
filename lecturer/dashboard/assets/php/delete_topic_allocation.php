<?php

    include 'database.php';
    
    $gID = $_POST['gid'];
    $tID = $_POST['tid'];
    
    $cmd = $conn->prepare("DELETE FROM groups_topics WHERE gid = ? AND tid = ?");
    $cmd->bind_param("ss",$gID,$tID);
    $cmd->execute();
    if($cmd->affected_rows > 0)
    {
        $cmd = $conn->prepare("UPDATE topic SET scount = scount - 1 WHERE id =  ?");
        $cmd->bind_param("s",$tID);
        if($cmd->execute())
        {
            echo "OK";
        }
    }
    else
    {
        echo "FAIL";
    }