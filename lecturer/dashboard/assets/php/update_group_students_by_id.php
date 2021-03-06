<?php

    include 'database.php';
    
    $members = explode(',',$_POST['members']);
    $group_id = $_POST['id'];
    $count = $_POST['count'];
    
    $cmd = $conn->prepare("DELETE FROM `groups_students` WHERE gid = ?");
    $cmd->bind_param("s",$group_id);
    $cmd->execute();
    if($cmd->affected_rows > 0)
    {
        $x = count($members);
        $y = 0;
        
        for($y = 0 ; $y < $x ; ++$y)
        {
            $mem_id = $members[$y];
            $cmd = $conn->prepare("INSERT INTO groups_students( gid, sid) VALUES ( ?, ? )");
            $cmd->bind_param("ss",$group_id,$mem_id);
            $cmd->execute();
        }
        $cmd = $conn->prepare("UPDATE `groups` SET `student_count`= ? WHERE id = ?");
        $cmd->bind_param("ss",$count,$group_id);
        $cmd->execute();
        if($cmd->affected_rows > 0)
        {
            echo "OK";
        }
        else
        {
            echo "FAIL";
        }
        
    }