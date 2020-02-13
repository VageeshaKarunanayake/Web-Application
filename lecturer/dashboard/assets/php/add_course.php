<?php 

    include 'database.php';
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    
    
    $cmd = $conn->prepare("INSERT INTO course( id, name, year, semester) VALUES ( ?, ?, ?, ?)");
    $cmd->bind_param("ssii",$id,$name,$year,$semester);
    if($cmd->execute())
    {
        if($cmd->affected_rows > 0)
        {
            echo "OK";
        }
        else
        {
            echo "FAIL";
        }
        
    }
    else
    {
        echo "FAIL";
    }