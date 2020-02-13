<?php

	include('database.php');
	$lid = $_POST['rid'];

	
	$cmd = $conn->prepare("SELECT * FROM `groups` WHERE id = ?");
	$cmd->bind_param("s",$lid);
	$cmd->execute();
	$result = $cmd->get_result();
	$data = array();
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
		$data['id'] = $row['id'];
		$data['name'] = $row['name'];   
		$data['year'] = $row['year'];
		$data['semester'] = $row['semester'];
		$data['course'] = $row['course'];
		$data['student_count'] = $row['student_count'];
	    }

		echo json_encode($data);
	}
	else
	{
		echo "0";
	}
