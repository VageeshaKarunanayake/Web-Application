<?php

    $db_host = "localhost";
    $db_username = "chamodpr_ccp";
    $db_password = "Password12@12";
    $db_name = "chamodpr_ccp";
    
    $conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if($conn != null)
    {
        //echo "Database Connected!";
    }
    else
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
