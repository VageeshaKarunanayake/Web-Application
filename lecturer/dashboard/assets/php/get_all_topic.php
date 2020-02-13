<?php

    include 'database.php';

    $cmd = $conn->prepare("SELECT * FROM topic");
    $cmd->execute();
    $result = $cmd->get_result();
    if($result->num_rows == 0)
    {

    }
    else
    {
        $topics = array();
        $topics_count = 0;
        while($row = $result->fetch_assoc())
        {
            $topic = array();
            $topic['id'] = $row['id'];
            $topic['name'] = $row['name'];
            $topic['course'] = $row['course'];
            $topic['description'] = $row['description'];
            array_push($topics,$topic);
            $topics_count++;
        }
        $topics['count'] = $topics_count;
        echo json_encode($topics);
    }

?>