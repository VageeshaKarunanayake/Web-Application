<?php

    include 'database.php';
    
    $old_module_code = $_POST['old_code'];
    $new_module_code = $_POST['new_code'];
    $new_module_name = $_POST['new_name'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    
    $cmd = $conn->prepare("UPDATE `course` SET `id`= ?,`name`= ?,`year`= ?,`semester`= ? WHERE id = ?");
    $cmd->bind_param("ssiis",$new_module_code,$new_module_name,$year,$semester,$old_module_code);
    $cmd->execute();
    if($cmd->affected_rows > 0)
    {
        echo "OK";
    }
    else
    {
        echo "FAIL";
    }
    