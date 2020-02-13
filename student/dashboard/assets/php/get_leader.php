<?php

	include('database.php');
	$lid = $_POST['lid'];

	
	$cmd = $conn->prepare("SELECT * FROM `student` WHERE id = ?");
	$cmd->bind_param("s",$lid);
	$cmd->execute();
	$result = $cmd->get_result();
	$data = array();
	$count = 0;
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$y = $row['year'];
			$s = $row['semester'];
			$smtm = $conn->prepare("SELECT * FROM course WHERE year = ? AND semester = ?");
			$smtm->bind_param("ii",$y,$s);
			$smtm->execute();
            $results = $smtm->get_result();
            while($rows = $results->fetch_assoc())
		{
			array_push($data,$rows);
			++$count;
		}
		$data['contact'] = $row['mobile'];
		$data['year'] = $row['year'];
		$data['semester'] = $row['semester'];
	}
		$data['count'] = $count;

		echo json_encode($data);
	}
	else
	{
		echo "0";
	}
