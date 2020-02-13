<?php

    include 'database.php';

    $prorata = $_POST['prorata'];
    $cmd = $conn->prepare("SELECT * FROM groups WHERE prorata = ?");
    $cmd->bind_param("s",$prorata);
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
            $group['year'] = $row['year'];
            $group['semester'] = $row['semester'];
            array_push($groups,$group);
            $groups_count++;
        }
        $groups['count'] = $groups_count;
        echo json_encode($groups);
    }

?>