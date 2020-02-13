<?php

    include 'database.php';
    $stmt = $conn->prepare("SELECT * FROM student");
    $stmt->execute();
    $result = $stmt->get_result();
    $students = array();
    $student_count = 0;
    $i = 1;
    if($result->num_rows != 0)
    {
        while($row = $result->fetch_assoc())
        {
            $student = array();
            $student['id'] = $row['id'];
            $student['name'] = $row['name'];
            $student['mobile'] = $row['mobile'];
            $student['email'] = $row['email'];
            $student['year'] = $row['year'];
            $student['gpa'] = $row['gpa'];
            $student['semester'] = $row['semester'];
            $student['prorata'] = $row['prorata'];
            
            ++$student_count;
            array_push($students,$student);
        }
        $students['count'] = $student_count;
        echo json_encode($students);
    }
    else
    {
        echo json_encode("NO DATA");
    }
    