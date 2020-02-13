<?php

    include 'database.php';
    
    
    $group_id = $_POST['gid'];
    $topic_id = $_POST['tid'];
   
    
    $cmd = $conn->prepare("SELECT tid FROM groups_topics WHERE gid = ?");
    $cmd->bind_param("s",$group_id);
    $cmd->execute();
    $result = $cmd->get_result();
    $row = $result->fetch_assoc();
    $old_tid = $row['tid'];
    
    
    $cmd = $conn->prepare("UPDATE topic SET scount = scount - 1 WHERE id =  ?");
    $cmd->bind_param("s",$old_tid);
    if($cmd->execute())
    {
        $cmd = $conn->prepare("UPDATE `groups_topics` SET `tid`= ? WHERE gid = ?");
        $cmd->bind_param("ss",$topic_id,$group_id);
        $cmd->execute();
        if($cmd->affected_rows > 0)
        {
            $cmd = $conn->prepare("UPDATE topic SET scount = scount + 1 WHERE id =  ?");
            $cmd->bind_param("s",$topic_id);
            if($cmd->execute())
            {
               echo "OK"; 
            }
        }
        else
        {
            echo "FAIL";
        }  
    }
    
    
        
