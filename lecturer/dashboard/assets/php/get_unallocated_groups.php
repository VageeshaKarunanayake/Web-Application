<?php

    include 'database.php';
    $y = $_POST['year'];
    $s = $_POST['semester'];
    $m = $_POST['module'];
    $p = $_POST['prorata'];
    
    $cmd = $conn->prepare("SELECT * FROM groups WHERE year = ? AND semester = ? AND course = ? AND prorata = ? AND id NOT IN (SELECT gid FROM groups_topics)");
    $cmd->bind_param("iisi",$y,$s,$m,$p);
    $cmd->execute();
    $result = $cmd->get_result();
    if($result->num_rows == 0)
    {

    }
    else
    {
        $groups = array();
        $groups_count = 0;
        while($row = $result->fetch_assoc())
        {
            $group = array();
            $group['id'] = $row['id'];
            $group['name'] = $row['name'];
            $group['memcount'] = $row['student_count'];
            $group['year'] = $y;
            $group['semester'] = $s;
            array_push($groups,$group);
            $groups_count++;
        }
        $groups['count'] = $groups_count;
        echo json_encode($groups);
    }

?>