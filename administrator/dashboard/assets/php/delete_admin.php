<?php

    include 'database.php';
    $id = $_POST['id'];
    if(isset($id) == false)
    {
        echo "No Data";
    }
    else
    {
        $stmt = $conn->prepare("DELETE FROM admin WHERE username = ?");
        $stmt->bind_param("s",$id);
        if($stmt->execute())
        {
            if($stmt->affected_rows > 0)
            {
                echo "OK";
            }
        }
        else
        {
            echo "FAIL";
        }
    }

?>