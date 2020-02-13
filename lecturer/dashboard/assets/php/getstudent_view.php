<?php

    include 'database.php';
    
    $module = $_POST['module'];
    $prorata = $_POST['prorata'];
    $y = $_POST['year'];
    $s = $_POST['semester'];
    $gid = $_POST['gid'];
    
    
    $cmd = $conn->prepare("SELECT * FROM student LEFT JOIN groups_students ON student.id=groups_students.sid WHERE groups_students.gid = ?");
    $cmd->bind_param("s",$gid);
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
        $students['count'] = $count;
    echo json_encode($students);
    }
    else
    {
        
    }
   
  
    
    
?>