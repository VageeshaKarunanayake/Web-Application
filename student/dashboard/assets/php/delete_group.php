<?php

    include 'database.php';
    
    $id = $_GET['id'];
    
    $cmd = $conn->prepare("DELETE FROM groups WHERE id = ?");
    $cmd->bind_param("s",$id);
    $cmd->execute();
    if($cmd->affected_rows > 0)
    {
       $cmd = $conn->prepare("DELETE FROM groups_students WHERE gid = ?");
       $cmd->bind_param("s",$id);
       $cmd->execute();
       if($cmd->affected_rows > 0)
    {
         $cmd = $conn->prepare("DELETE FROM group_leader WHERE gid = ?");
       $cmd->bind_param("s",$id);
       $cmd->execute();
       if($cmd->affected_rows > 0)
       {
           $qstring = '?status=dsucc';
           header("Location: ../../managegroups.php"."$qstring");
       }
    }
    else
    {
        $qstring = '?status=dsucc';
       header("Location: ../../managegroups.php"."$qstring");
    }
    }
     else
    {
        $qstring = '?status=derro';
       header("Location: ../../managegroups.php"."$qstring");
    }
    ?>
    