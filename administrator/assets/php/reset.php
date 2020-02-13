<?php

    include 'database.php';
    include 'email.php';


    //Password Generata Function
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    
    if((isset($_POST['username'])) == false)
    {
        echo 1; //NOT ENOUGH DATA
    }
    else
    {
        //Get Email Address
        $username = $_POST['username'];
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0)
        {
           echo 2; // NO USER EXISTS;
        }
        else
        {
            while ($row=$result->fetch_assoc())
            {
                $to = $row['email'];
                //Genarate Password
                $password = generateRandomString();
                $md5Password = md5($password);
                
                //update user password
                $stmt = $conn ->prepare("UPDATE admin SET password = ? WHERE username = ?");
                $stmt->bind_param("ss",$md5Password,$username);
                if($stmt->execute() == false)
                {
                    echo 3; //Password Update Failed
                }
                else
                {
                    send_password_reset_email($to,$password);
                }
            }
        }
    }
?>