<?php

    include 'database.php';
    $gid = $_POST['gid'];
 
    $cmd = $conn->prepare("SELECT * FROM groups WHERE id = ?");
    $cmd->bind_param("s",$gid);
    $cmd->execute();
    $result = $cmd->get_result();
    if($result->num_rows == 0)
    {

    }
    else
    {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }

?>