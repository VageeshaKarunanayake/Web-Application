<?php

 
        include 'database.php';
        require 'email.php';
        $module = $_POST['module'];
        $size = $_POST['size'];
        $prorata = 1;
        
        //Get Module Year and Semester 
        $cmd = $conn->prepare("SELECT * FROM course WHERE id = ?");
        $cmd->bind_param("s",$module);
        $cmd->execute();
        $module_result = $cmd->get_result();
        $module_row = $module_result->fetch_assoc();
        $y = $module_row['year'];
        $s = $module_row['semester'];
        
     
        
        
        //Get Student List
        $cmd = $conn->prepare("SELECT * FROM student WHERE prorata = 1 AND year = ? AND semester = ? AND id NOT IN(SELECT sid FROM groups_students , groups WHERE gid = groups.id AND groups.course = ?)");
        $cmd->bind_param("iis",$y,$s,$module);
        if($cmd->execute())
        {
            $student_result = $cmd->get_result(); 
            $student = array();
            while($student_row = $student_result->fetch_assoc())
            {
                array_push($student,$student_row);
            }
            shuffle($student);
            
            //Make Group
            while(count($student) != 0)
            {
                $gid = get_group_id();
                $cmd = $conn->prepare("INSERT INTO groups( id, name, year, semester, student_count, course , prorata) VALUES ( ?, ?, ?, ?, ?, ?,? )");
                if(count($student) < $size)
                {
                    $size = count($student);
                }
                $cmd->bind_param("ssiiisi",$gid,$gid,$y,$s,$size,$module,$prorata);
                $cmd->execute();
                if($cmd->affected_rows > 0)
                {
                    
                    $x = 0;
                    while($x < $size)
                    {
                        
                        $std = array_pop($student);
                        $mem_id = $std['id'];
                        $cmd = $conn->prepare("INSERT INTO groups_students( gid, sid) VALUES ( ?, ? )");
                        $cmd->bind_param("ss",$gid,$mem_id);
                        if($cmd->execute())
                        {
                            $cmd = $conn->prepare("SELECT email FROM `student` WHERE id = ?");
                            $cmd->bind_param("s",$mem_id);
                            $cmd->execute();
                            $r = $cmd->get_result();
                            $rr = $r->fetch_assoc();
                            send_student_group_success($rr['email'] , $module , $gid);
                        }
                        ++$x;
                        if(count($student) == 0)
                        {
                            break;
                        }
                    }
                    $x = 0;
                }
                else
                {
                    echo "FAIL";
                    exit();
                }
            }
            echo "OK";
        }
        else
        {
            echo "FAIL";
        }
        

    



    
    
    function get_group_id()
    {
        include 'database.php';
        $module = $_POST['module'];
        $prefix = $module . "-" . date("Y")."-";
        $postfix = 1;
        
        $x = false;
        
        do
        {
            $gid = $prefix . $postfix;
            $cmd = $conn->prepare("SELECT * FROM groups WHERE course = ? AND id = ?");
            $cmd->bind_param("ss",$module,$gid);
            $cmd->execute();
            $result= $cmd->get_result();
            $count = $result->num_rows;
            if($count > 0)
            {
                ++$postfix;
            }
            else
            {
                $x = true;
            }
        }
        while($x == false);
        return $gid;
    }
?>