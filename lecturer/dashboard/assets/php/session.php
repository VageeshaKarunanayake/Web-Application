<?php

    session_start();
    include 'database.php';
    
    if(isset($_SESSION['id']) && isset($_SESSION['hash']) && isset($_SESSION['type']))
    {
        $username = $_SESSION['id'];
        $password = $_SESSION['hash'];
        $type = $_SESSION['type'];
        
        $cmd = $conn->prepare("SELECT * FROM lecturer WHERE email = ? AND password = ?");
        $cmd->bind_param("ss",$username,$password);
        $cmd->execute();
        $result = $cmd->get_result();
        if(($result->num_rows > 0) && ($type == "lecturer"))
        {
            //do nothing
        }
        else
        {
            echo "<script>window.location.replace('https://chamodpriyamal.com/ccp/lecturer/index.php');</script>";
        }
    }
    else
    {
        echo "<script>window.location.replace('https://chamodpriyamal.com/ccp/lecturer/index.php');</script>";
    }

?>