<?php

    include 'database.php';
    
    $module = $_POST['module'];
    $prorata = $_POST['prorata'];
    $y = $_POST['year'];
    $s = $_POST['semester'];
    $gid = $_POST['gid'];
    
    
    $cmd = $conn->prepare("SELECT * FROM student WHERE prorata = ? AND year = ? AND semester = ? AND id NOT IN(SELECT sid FROM groups_students , groups WHERE gid = groups.id AND groups.course = ?)");
    $cmd->bind_param("iiis",$prorata,$y,$s,$module);
    $count = 0;
    $students = array();
    $cmd->execute();
    $result= $cmd->get_result();
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $student = array();
            $student['id'] = $row['id'];
            $student['name'] = $row['name'];
            array_push($students,$student);
            ++$count;
        }
        
    }
    else
    {
        
    }
    $cmd = $conn->prepare("SELECT * FROM student , groups_students WHERE groups_students.gid = ? AND student.id = groups_students.sid");
    $cmd->bind_param("s",$gid);
    $cmd->execute();
    $result= $cmd->get_result();
    while($row = $result->fetch_assoc())
    {
        $student = array();
        $student['id'] = $row['id'];
        $student['name'] = $row['name'];
        array_push($students,$student);
        ++$count;
    }
    $students['count'] = $count;
    echo json_encode($students);
    
?>