<?php 

    include 'database.php';
 
    $id = $_POST['groupid'];
    $name = $_POST['groupid'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $module = $_POST['modle'];
    $member_amount = $_POST['memcount'];
    $prorata = $_POST['gtype'];
    $members = $_POST['members'];
    $leader = $_POST['leader'];
    
    $cmd = $conn->prepare("INSERT INTO groups( id, name, year, semester, student_count, course , prorata) VALUES ( ?, ?, ?, ?, ?, ?,? )");
    $cmd->bind_param("ssiiisi",$id,$name,$year,$semester,$member_amount,$module,$prorata);
    if($cmd->execute())
    {
    
        $x = count($members);
        $y = 0;
        
        for($y = 0 ; $y < $x ; ++$y)
        {
            $mem_id = $members[$y];
            $cmd = $conn->prepare("INSERT INTO groups_students( gid, sid) VALUES ( ?, ? )");
            $cmd->bind_param("ss",$id,$mem_id);
            $cmd->execute();
        }
       $cmd = $conn->prepare("INSERT INTO group_leader( gid, lid) VALUES ( ?, ? )");
       $cmd->bind_param("ss",$id,$leader);
    if($cmd->execute())
    {
        $cmd = $conn->prepare("INSERT INTO groups_students( gid, sid) VALUES ( ?, ? )");
       $cmd->bind_param("ss",$id,$leader);
       $cmd->execute();
       $qstring = '?status=succ';
        header("Location: ../../managegroups.php"."$qstring");
    }
    }
    else
    {
       $qstring = '?status=err';
        header("Location: ../../managegroups.php"."$qstring");
    }
    ?>