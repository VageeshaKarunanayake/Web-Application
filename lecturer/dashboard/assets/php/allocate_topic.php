<?php

    include 'database.php';
    require 'email.php';
    $gid = $_POST['gid'];
    $tid = $_POST['tid'];
    
    $cmd = $conn->prepare("Select * From topic Where id = ?");
    $cmd->bind_param("s",$tid);
    $cmd->execute();
    $result = $cmd->get_result();
    $topic_details = $result->fetch_assoc();
        
    
    
    $cmd = $conn->prepare("INSERT INTO groups_topics( gid, tid) VALUES ( ?, ? )");
    $cmd->bind_param("ss",$gid,$tid);
    if($cmd->execute())
    {
        $cmd = $conn->prepare("UPDATE topic SET scount = scount + 1 WHERE id =  ?");
        $cmd->bind_param("s",$tid);
        if($cmd->execute())
        {
            $cmd = $conn->prepare("Select email FROM student,groups_students where student.id = groups_students.sid and groups_students.gid = ?");
            $cmd->bind_param("s",$gid);
            $cmd->execute();
            $result = $cmd->get_result();
            while($row = $result->fetch_assoc());
            {
                $to = $row['email'];
                
                $XCourse = $topic_details['course'];
                $Tname = $topic_details['name'];
                $TDesc = $topic_details['description'];
                send_student_group_topic_allocate($to , $gid , $tid ,$XCourse , $Tname, $TDesc);
            }

            echo 'OK';
        }
    
    }
    else
    {
        echo 'FAIL';
    }
