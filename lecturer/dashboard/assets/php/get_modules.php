<?php

    include 'database.php';
    $y = $_POST['year'];
    $s = $_POST['semester'];
    
    $cmd = $conn->prepare("SELECT * FROM course WHERE year = ? AND semester = ?");
    $cmd->bind_param("ii",$y,$s);
    $cmd->execute();
    $result = $cmd->get_result();
    if($result->num_rows == 0)
    {
        echo json_encode("NO DATA");
    }
    else
    {
        $modules = array();
        $modules_count = 0;
        while($row = $result->fetch_assoc())
        {
            $module= array();
            $module['id'] = $row['id'];
            $module['name'] = $row['name'];
            array_push($modules,$module);
            $modules_count++;
        }
        $modules['count'] = $modules_count;
        echo json_encode($modules);
    }

?>