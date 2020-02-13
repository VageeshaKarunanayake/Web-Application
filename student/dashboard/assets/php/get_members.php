<?php

	include('database.php');
	$cmd = $conn->prepare("SELECT * FROM `student`");
	$cmd->execute();
	$result = $cmd->get_result();
	
	if($result->num_rows > 0)
	{
		$count = 0;
		$list = array();
		while($row = $result->fetch_assoc())
		{
			array_push($list,$row);
			++$count;
		}
		$list['count'] = $count;
		echo json_encode($list);
	}
	else
	{
		echo "0";
	}
