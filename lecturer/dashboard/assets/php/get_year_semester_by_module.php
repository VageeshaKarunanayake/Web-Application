<?php

    include 'database.php';
    $m = $_POST['module'];

    
    $cmd = $conn->prepare("SELECT * FROM course WHERE id=?");
    $cmd->bind_param("s",$m);
    $cmd->execute();
    $result = $cmd->get_result();
    if($result->num_rows == 0)
    {
        echo 0;
    }
    else
    {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }

?>