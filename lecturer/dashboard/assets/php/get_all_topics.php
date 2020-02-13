<?php

    include 'database.php';
    $cmd = $conn->prepare("SELECT * FROM topic");
    $cmd->execute();
    $result = $cmd->get_result();
    $topics = array();
    $count = 0;
    while($row = $result->fetch_assoc())
    {
        $topic = array();
        $topic['id'] = $row['id'];
        $topic['name'] = $row['name'];
        $topic['scount'] = $row['scount'];
        $topic['course'] = $row['course'];
        $topic['description'] = $row['description'];
        array_push($topics,$topic);
        ++$count;
    }
    $topics['count'] = $count;
    echo json_encode($topics);

?>