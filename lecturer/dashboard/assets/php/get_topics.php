<?php

    include 'database.php';
    $module = $_POST['module'];
    $cmd = $conn->prepare("SELECT * FROM topic WHERE course = ?");
    $cmd->bind_param("s",$module);
    $cmd->execute();
    $result = $cmd->get_result();
    
    if($result->num_rows == 0)
    {

    }
    else
    {
    $topics = array();
    $count = 0;
    while($row = $result->fetch_assoc())
    {
        $topic = array();
        $topic['id'] = $row['id'];
        $topic['name'] = $row['name'];
        $topic['count'] = $row['scount'];
        array_push($topics,$topic);
        ++$count;
    }
    $topics['count'] = $count;
    echo json_encode($topics);
    }
?>