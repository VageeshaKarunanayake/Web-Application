<?php

    include 'database.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if((isset($username) && isset($password)) == false)
    {
        echo 1; //NOT ENOUGH DATA
    }
    else
    {
        $stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
        $stmt->bind_param("s",$username);
        if($stmt->execute() == false)
        {
            echo 2; //query execute fail
        }
        else
        {
            $result = $stmt->get_result();
            if($result->num_rows == 0)
            {
                echo 3; //User Doesnt Exists
            }
            else
            {
                while ($row = $result->fetch_assoc())
                {
                    if($row['password'] == $password)
                    {
                        if(session_start())
                        {
                            $_SESSION['type'] = "student";
                            $_SESSION['hash'] = $password;
                            $_SESSION['id'] = $username;
                            echo 4; // Login Success 
                        }
                        else
                        {
                            echo 5; //Invalid Creds
                        }
                    }
                }
            }
        }
    } 
?>