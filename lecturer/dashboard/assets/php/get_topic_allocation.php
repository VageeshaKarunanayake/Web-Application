<?php

    include 'database.php';
    
    $module = $_POST['module'];
    $prorata = $_POST['prorata'];
    
    $cmd = $conn->prepare("SELECT topic.name AS TOPICNAME, topic.id AS TOPICID , groups.name AS GROUPNAME , groups.id AS GROUPID FROM topic , groups_topics, groups WHERE topic.id = groups_topics.tid AND groups_topics.gid = groups.id AND groups.course = ? AND groups.prorata = ?");
    $cmd->bind_param("ss",$module,$prorata);
    $cmd->execute();
    $result = $cmd->get_result();
    
    if($result->num_rows == 0)
    {

    }
    else
    {
        $allocations = array();
        $count = 0;
        
        while($row = $result->fetch_assoc())
        {
            $allocation = array();
            
            $allocation['group'] = $row['GROUPNAME'];
            $allocation['topic'] = $row['TOPICNAME'];
            $allocation['gid'] = $row['GROUPID'];
            $allocation['tid'] = $row['TOPICID'];
            array_push($allocations,$allocation);
            ++$count;
        }
        $allocations['count'] = $count;
        echo json_encode($allocations);
    }