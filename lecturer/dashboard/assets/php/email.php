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

    function send_student_registration_success_admin($to , $password)
    {
        $smtp_host = "ssl://mail.chamodpriyamal.com";
        $smtp_username = "pubglite@chamodpriyamal.com";
        $smtp_password = "facehackA!1";
        $smtp_port = "465";
        $email_from = "pubglite@chamodpriyamal.com";
        $email_subject = "Registration Success!";
        $email_body = "You Have Successfully Registered with Student Group Management System.\nYou Username : Your Student ID Number\nPassword : " . $password;
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
    
    
    function send_student_group_success($to , $module , $group)
    {
        $smtp_host = "ssl://mail.chamodpriyamal.com";
        $smtp_username = "pubglite@chamodpriyamal.com";
        $smtp_password = "facehackA!1";
        $smtp_port = "465";
        $email_from = "pubglite@chamodpriyamal.com";
        $email_subject = "You Have been Added to a Group!";
        $email_body = "You Have Successfully Added to the Group : " . $group . " For Module : " . $module . "\nThank You";
        $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject);
        $smtp = Mail::factory('smtp', array ('host' => $smtp_host, 'port' => $smtp_port, 'auth' => true, 'username' => $smtp_username, 'password' => $smtp_password));
        $mail = $smtp->send($to, $headers, $email_body);
        if (PEAR::isError($mail))
        {
            //echo 9; //fail
        }
        else
        {
            //echo 10;
        }
    }
    
    function send_student_group_topic_allocate($to , $gid , $tid ,$course , $topicName, $topicDesc)
    {
        //$smtp_host = "ssl://mail.chamodpriyamal.com";
        //$smtp_username = "ccp@chamodpriyamal.com";
        //$smtp_password = "Password12@12";
        //$smtp_port = "465";
        //$email_from = "ccp@chamodpriyamal.com";
        
        $smtp_host = "ssl://smtp.gmail.com";
        $smtp_username = "apweslk@gmail.com";
        $smtp_password = "w7CAgEh45CEv5fxS";
        $smtp_port = "465";
        $email_from = "apweslk@gmail.com";
        $email_subject = "You Have been Added to a Group!";
        $email_body = "A New Topic Has Been Allocated for your Group : ".$gid." OF Module : ".$course."\nTopic Name : " . $topicName . " \nDescription : " . $topicDesc . "\nThank You";
        $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject);
        $smtp = Mail::factory('smtp', array ('host' => $smtp_host, 'port' => $smtp_port, 'auth' => true, 'username' => $smtp_username, 'password' => $smtp_password));
        $mail = $smtp->send($to, $headers, $email_body);
        if (PEAR::isError($mail))
        {
            //echo 9; //fail
        }
        else
        {
            //echo 10;
        }
    }
?>