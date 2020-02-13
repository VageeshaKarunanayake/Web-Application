<?php
    
    include 'database.php';
    
    $course_count;
    $group_count;
    $regular_std;
    $prorata_std;
    
    $cmd = $conn->prepare("SELECT COUNT(id) FROM course");
    $cmd->execute();
    $cmd->bind_result($course_count);
    $cmd->fetch();
    
    $cmd = null;
    
    $cmd = $conn->prepare("SELECT COUNT(id) FROM groups");
    $cmd->execute();
    $cmd->bind_result($group_count);
    $cmd->fetch();
    
    $cmd = null;
    
    $cmd = $conn->prepare("SELECT COUNT(id) FROM student WHERE prorata = 0");
    $cmd->execute();
    $cmd->bind_result($regular_std);
    $cmd->fetch();
    
    $cmd = null;
    
    $cmd = $conn->prepare("SELECT COUNT(id) FROM student WHERE prorata = 1");
    $cmd->execute();
    $cmd->bind_result($prorata_std);
    $cmd->fetch();
    
    $cmd = null;
    
    $cmd = $conn->prepare("SELECT COUNT(id) FROM topic");
    $cmd->execute();
    $cmd->bind_result($topic);
    $cmd->fetch();
    
    $arr = array();
    
    $arr['course'] = $course_count;
    $arr['group'] = $group_count;
    $arr['regular'] = $regular_std;
    $arr['prorata'] = $prorata_std;
    $arr['topic'] = $topic;
    echo json_encode($arr);