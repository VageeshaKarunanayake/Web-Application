<?php

    include 'database.php';
    $id = $_POST['id'];
    if(isset($id) == false)
    {
        echo "No Data";
    }
    else
    {
        $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        if($stmt->affected_rows > 0)
        {
            echo "DELETE SUCCESS";
        }
        else
        {
            echo "DELETE FAIL";
        }
    }

?>