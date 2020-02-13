<?php

    ini_set("include_path", '/home5/chamodpr/php:' . ini_get("include_path") );
    require_once "Mail.php";
    
    function send_password_reset_email($to , $password)
    {
        $smtp_host = "ssl://mail.chamodpriyamal.com";
        $smtp_username = "pubglite@chamodpriyamal.com";
        $smtp_password = "facehackA!1";
        $smtp_port = "465";
        $email_from = "pubglite@chamodpriyamal.com";
        $email_subject = "Password Reset Success!";
        $email_body = "Your New Password is : " . $password;
        $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject);
        $smtp = Mail::factory('smtp', array ('host' => $smtp_host, 'port' => $smtp_port, 'auth' => true, 'username' => $smtp_username, 'password' => $smtp_password));
        $mail = $smtp->send($to, $headers, $email_body);
        if (PEAR::isError($mail))
        {
            echo 9; //fail
        }
        else
        {
            echo 10;
        }
    }

?>