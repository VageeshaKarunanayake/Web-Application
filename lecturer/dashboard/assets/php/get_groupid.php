<?php

    include 'database.php';
    
    
    $module = $_POST['module'];
    $prefix = $module . "-" . date("Y")."-";
    $postfix = 1;
    
    $x = false;
    
    do
    {
        $gid = $prefix . $postfix;
        $cmd = $conn->prepare("SELECT * FROM groups WHERE course = ? AND id = ?");
        $cmd->bind_param("ss",$module,$gid);
        $cmd->execute();
        $result= $cmd->get_result();
        $count = $result->num_rows;
        if($count > 0)
        {
            ++$postfix;
        }
        else
        {
            $x = true;
        }
    }while($x == false);
    echo $gid;

?>
    