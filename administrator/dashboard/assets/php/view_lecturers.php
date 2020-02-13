<?php

    include 'database.php';
    $stmt = $conn->prepare("SELECT * FROM lecturer");
    $stmt->execute();
    $result = $stmt->get_result();
    $lecturers = array();
    $lecturer_count = 0;
    $i = 1;
    if($result->num_rows != 0)
    {
        while($row = $result->fetch_assoc())
        {
            array_push($lecturers,$row);
            /*$lecturer = array();
            $lecturer['id'] = $row['id'];
            $lecturer['name'] = $row['name'];
            $lecturer['mobile'] = $row['mobile'];
            $lecturer['email'] = $row['email'];
            $lecturer['year'] = $row['year'];
            $lecturer['semester'] = $row['semester'];
            $lecturer['prorata'] = $row['prorata'];*/
            
            ++$lecturer_count;
            //array_push($lecturers,$lecturer);
        }
        $lecturers['count'] = $lecturer_count;
        echo json_encode($lecturers);
    }
    else
    {
        echo json_encode("NO DATA");
    }