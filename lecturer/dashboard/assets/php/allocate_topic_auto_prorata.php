<?php

    include 'database.php';
    
    //Get Group ID LIST
    $module = $_POST['module'];
    $prorata = 1;
    $cmd = $conn->prepare("SELECT id FROM groups WHERE course = ? AND prorata = ? AND id NOT IN (SELECT gid FROM groups_topics)");
    $cmd->bind_param("si",$module,$prorata);
    $cmd->execute();
    $result = $cmd->get_result();
    $gids = array();
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($gids,$row['id']);
        }
    }
    else
    {
        echo "NO GROUPS";
        exit();
    }
    
  
   
    
    //Get Topics
    $cmd = $conn->prepare("SELECT id FROM topic WHERE course = ?");
    $cmd->bind_param("s",$module);
    $cmd->execute();
    $result = $cmd->get_result();
    $tids = array();
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($tids,$row['id']);
        }
    }
    else
    {
        echo "NO TOPICS";
        exit();
    }
    
    
     
     
    for($t = 0 ; $t < count($tids) ; ++$t)
    {
        if(count($gids) == 0)
        {
            break;
        }
        else
        {
           
            $gid = array_pop($gids);
            $tid = $tids[$t];
            $cmd = $conn->prepare("INSERT INTO groups_topics( gid, tid) VALUES ( ?, ? )");
            $cmd->bind_param("ss",$gid,$tid);
            if($cmd->execute())
            {
                $cmd = null;
                $cmd = $conn->prepare("UPDATE topic SET scount = (scount + 1) WHERE id =  ?");
                $cmd->bind_param("s",$tid);
                $cmd->execute();
            }
            else
            {
                echo 'FAIL';
                exit();
            }
        }
        if($t == count($tids) -1)
        {
            $t = 0;
        }
        $cmd =  null;
    }
    echo "OK";