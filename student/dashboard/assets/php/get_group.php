<?php

    include 'database.php';
    $y = $_POST['led'];
    
    $cmd = $conn->prepare("SELECT * FROM groups LEFT JOIN group_leader ON groups.id = group_leader.gid WHERE group_leader.lid = ?");
    $cmd->bind_param("s",$y);
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
            $module['year'] = $row['year'];
            $module['semester'] = $row['semester'];
            array_push($modules,$module);
            $modules_count++;
        }
        $modules['count'] = $modules_count;
        //echo json_encode($modules);
         echo json_encode($modules);
    }

?>