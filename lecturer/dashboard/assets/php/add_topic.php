<?php 

    include 'database.php';
    

    $name = $_POST['name'];
    $cid = $_POST['cid'];
    $description = $_POST['desc'];
    
    $cmd = $conn->prepare("SELECT MAX(CAST(SUBSTRING(id,2) AS int))+1 AS NEWID FROM `topic`") ;
    $cmd->execute();
    $result = $cmd->get_result();
    $row = $result->fetch_assoc();
    $id = "T" . $row['NEWID'];
    if($id == "T")
    {
        $id = "T1";
    }
   
    
    
    
    $cmd = $conn->prepare("INSERT INTO topic( id, name, course, description) VALUES ( ?, ?, ?, ?)");
    $cmd->bind_param("ssss",$id,$name,$cid,$description);
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