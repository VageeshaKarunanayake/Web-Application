<?php

    include 'database.php';
    require 'email.php';
    
    $module = $_POST['module'];
    $size = $_POST['size'];
    $prorata = 0;
    
    //Get Module Year and Semester 
    $cmd = $conn->prepare("SELECT * FROM course WHERE id = ?");
    $cmd->bind_param("s",$module);
    $cmd->execute();
    $module_result = $cmd->get_result();
    $module_row = $module_result->fetch_assoc();
    $y = $module_row['year'];
    $s = $module_row['semester'];
    
 
    
    
    //Get Student List
    $cmd = $conn->prepare("SELECT gpa,id FROM student WHERE prorata = 0 AND year = ? AND semester = ? AND id NOT IN(SELECT sid FROM groups_students , groups WHERE gid = groups.id AND groups.course = ?)");
    $cmd->bind_param("iis",$y,$s,$module);
    $cmd->execute();
    $student_result = $cmd->get_result(); 
    
    $all_student = array();
    while($student_row = $student_result->fetch_assoc())
    {
        array_push($all_student,$student_row);
    }
    
    //sort GPA
    asort($all_student);
    $all_student_count = count($all_student);
    //Create Arrays
    $sorted_list = array();
    
    $MODULES = $all_student_count % $size;
    $LIMIT = $all_student_count - $MODULES;
    $BASE_COUNT = $LIMIT / $size;
    $xxx = 0;
    $j = 0;
    foreach($all_student as $key => $item)
    {
        if(($j >= $LIMIT))
        {
            $xxx = $BASE_COUNT;
            $sorted_list[$xxx][$key] = $item;
            ++$j;
            
        }
        else
        {
            $sorted_list[$xxx][$key] = $item;
            ++$xxx;
            ++$j;
        }
        if($xxx == $BASE_COUNT)
        {
            $xxx = 0;
        }
    }
    
    //print_r($sorted_list[0]);
      
   
    for($i = 0; $i < $BASE_COUNT ; ++$i)
    {
        $gid = get_group_id();
        $cmd = $conn->prepare("INSERT INTO groups( id, name, year, semester, student_count, course , prorata) VALUES ( ?, ?, ?, ?, ?, ?,? )");
        $cmd->bind_param("ssiiisi",$gid,$gid,$y,$s,$size,$module,$prorata);
        $cmd->execute();
        if($cmd->affected_rows > 0)
        {
            foreach($sorted_list[$i] as $key)
            {
                $mem_id = $key['id'];
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
            }
        }
    }
    
    if($MODULES != 0)
    {
        $gid = get_group_id();
        $cmd = $conn->prepare("INSERT INTO groups( id, name, year, semester, student_count, course , prorata) VALUES ( ?, ?, ?, ?, ?, ?,? )");
        $cmd->bind_param("ssiiisi",$gid,$gid,$y,$s,$MODULES,$module,$prorata);
        $cmd->execute();
        if($cmd->affected_rows > 0)
        {
            foreach($sorted_list[$BASE_COUNT] as $key)
            {
                $mem_id = $key['id'];
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
            }
        }
    }
    echo "OK";

    



    
    
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