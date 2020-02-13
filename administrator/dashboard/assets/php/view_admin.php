<?php

    include 'database.php';
    $stmt = $conn->prepare("SELECT * FROM admin");
    $stmt->execute();
    $result = $stmt->get_result();
    $admins = array();
    $admins_count = 0;
    $i = 1;
    if($result->num_rows != 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($admins,$row);
            ++$admins_count;
        }
        $admins['count'] = $admins_count;
        echo json_encode($admins);
    }
    else
    {
        echo json_encode("NO DATA");
    }