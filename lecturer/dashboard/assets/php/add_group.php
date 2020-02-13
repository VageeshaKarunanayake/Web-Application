<?php 

    include 'database.php';
    require 'email.php';
    
    $id = $_POST['name'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $module = $_POST['module'];
    $member_amount = $_POST['count'];
    $prorata = $_POST['prorata'];
    $members = explode(',',$_POST['members']);
    
    
    $cmd = $conn->prepare("INSERT INTO groups( id, name, year, semester, student_count, course , prorata) VALUES ( ?, ?, ?, ?, ?, ?,? )");
    $cmd->bind_param("ssiiisi",$id,$name,$year,$semester,$member_amount,$module,$prorata);
    if($cmd->execute())
    {
        $x = count($members);
        $y = 0;
        
        for($y = 0 ; $y < $x ; ++$y)
        {
            $mem_id = $members[$y];
            $cmd = $conn->prepare("INSERT INTO groups_students( gid, sid) VALUES ( ?, ? )");
            $cmd->bind_param("ss",$id,$mem_id);
            if($cmd->execute())
            {
                $cmd = $conn->prepare("SELECT email FROM `student` WHERE id = ?");
                $cmd->bind_param("s",$mem_id);
                $cmd->execute();
                $r = $cmd->get_result();
                $rr = $r->fetch_assoc();
                send_student_group_success($rr['email'] , $module , $id);
            }
        }
        echo "OK";
    }
    else
    {
        echo "FAIL";
    }