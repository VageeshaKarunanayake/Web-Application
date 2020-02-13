<?php
    
    include 'database.php';
    
    $admin_count;
    $lecturer_count;
    $regular_std;
    $prorata_std;
    
    $cmd = $conn->prepare("SELECT COUNT(username) FROM admin");
    $cmd->execute();
    $cmd->bind_result($admin_count);
    $cmd->fetch();
    
    $cmd = null;
    
    $cmd = $conn->prepare("SELECT COUNT(email) FROM lecturer");
    $cmd->execute();
    $cmd->bind_result($lecturer_count);
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
    
    $arr = array();
    
    $arr['admin'] = $admin_count;
    $arr['lecturer'] = $lecturer_count;
    $arr['regular'] = $regular_std;
    $arr['prorata'] = $prorata_std;
    echo json_encode($arr);