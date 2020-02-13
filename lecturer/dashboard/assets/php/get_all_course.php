<?php

    include 'database.php';

    $cmd = $conn->prepare("SELECT * FROM course");
    $cmd->execute();
    $result = $cmd->get_result();
    if($result->num_rows == 0)
    {

    }
    else
    {
        $courses = array();
        $courses_count = 0;
        while($row = $result->fetch_assoc())
        {
            $course = array();
            $course['id'] = $row['id'];
            $course['name'] = $row['name'];
            $course['year'] = $row['year'];
            $course['semester'] = $row['semester'];
            array_push($courses,$course);
            $courses_count++;
        }
        $courses['count'] = $courses_count;
        echo json_encode($courses);
    }

?>