<?php

    include 'database.php';
    $id = $_POST['email'];
    if(isset($id) == false)
    {
        echo "No Data";
    }
    else
    {
        $stmt = $conn->prepare("DELETE FROM lecturer WHERE email = ?");
        $stmt->bind_param("s",$id);
        if($stmt->execute())
        {
            echo "OK";
        }
        else
        {
            echo "FAIL";
        }
    }

?>