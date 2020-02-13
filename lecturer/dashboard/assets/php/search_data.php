<?php

    include 'database.php';
    
    
    
    if($type == "students")
    {
        echo(" <thead id='tableTH'>
                    <th data-field='state' data-checkbox='false'></th>
                    <th data-field='id' class='text-center'>ID</th>
                    <th data-field='name' data-sortable='true'>Name</th>
                    <th data-field='mobile' data-sortable='true'>Mobile</th>
                    <th data-field='email' data-sortable='true'>Email</th>
                    <th data-field='gpa' data-sortable='true'>GPA</th>
                    <th data-field='year' data-sortable='true'>Year</th>
                    <th data-field='semester' data-sortable='true'>Semester</th>
                    <th data-field='prorata' data-sortable='true'>Student Type</th>
                </thead>
                <tbody>
            ");
            
        $cmd = $conn->prepare("SELECT * FROM student");
        $cmd->execute();
        $result = $cmd->get_result();
        if($result->num_rows > 0)
        {
            
            while($row = $result->fetch_assoc())
            {
                if($row['prorata'] == 0)
                {
                    $std_type = "Regular";
                }
                else
                {
                    $std_type = "Prorata";
                }
                echo("<tr>
                        <td></td>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['mobile']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['gpa']."</td>
                        <td>".$row['year']."</td>
                        <td>".$row['semester']."</td>
                        <td>".$std_type."</td>
                        </tr>
                    ");
            }
            echo "</tbody>";
        }
        else
        {
            
        }
    }
    elseif($type == "topics")
    {
        echo(" <thead id='tableTH'>
                    <th data-field='state' data-checkbox='false'></th>
                    <th data-field='id' class='text-center'>ID</th>
                    <th data-field='name' data-sortable='true'>Name</th>
                    <th data-field='description' data-sortable='true'>Description</th>
                    <th data-field='module' data-sortable='true'>Module</th>
                </thead>
                <tbody>
            ");
            
        $cmd = $conn->prepare("SELECT * FROM topic");
        $cmd->execute();
        $result = $cmd->get_result();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo("<tr>
                        <td></td>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['description']."</td>
                        <td>".$row['course']."</td>
                        </tr>
                    ");
            }
            echo "</tbody>";
        }
        else
        {
            
        }
    }
    elseif($type == "modules")
    {
        echo(" <thead id='tableTH'>
                    <th data-field='state' data-checkbox='false'></th>
                    <th data-field='id' class='text-center'>ID</th>
                    <th data-field='name' data-sortable='true'>Name</th>
                    <th data-field='year' data-sortable='true'>Year</th>
                    <th data-field='semester' data-sortable='true'>Semester</th>
                </thead>
                <tbody>
            ");
            
        $cmd = $conn->prepare("SELECT * FROM course");
        $cmd->execute();
        $result = $cmd->get_result();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo("<tr>
                        <td></td>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['year']."</td>
                        <td>".$row['semester']."</td>
                        </tr>
                    ");
            }
            echo "</tbody>";
        }
    }
    elseif($type == "groups")
    {
        echo(" <thead id='tableTH'>
                    <th data-field='state' data-checkbox='false'></th>
                    <th data-field='group_id' class='text-center'>Group ID</th>
                    <th data-field='year' data-sortable='true'>Group Year</th>
                    <th data-field='semester' data-sortable='true'>Group Semester</th>
                    <th data-field='std_count' data-sortable='true'>Student Count</th>
                    <th data-field='topic_id' data-sortable='true'>Topic ID</th>
                    <th data-field='topic_name' data-sortable='true'>Topic Name</th>
                    <th data-field='prorata' data-sortable='true'>Group Type</th>
                </thead>
                <tbody>
            ");
            
        $cmd = $conn->prepare("SELECT groups.prorata, groups.student_count , groups.year , groups.semester ,topic.name AS TOPICNAME, topic.id AS TOPICID , groups.name AS GROUPNAME , groups.id AS GROUPID FROM topic , groups_topics, groups WHERE topic.id = groups_topics.tid AND groups_topics.gid = groups.id");
        $cmd->execute();
        $result = $cmd->get_result();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                if($row['prorata'] == 0)
                {
                    $p = "Regular";
                }
                else
                {
                    $p = "Prorata";
                }
                echo("<tr>
                        <td></td>
                        <td>".$row['GROUPID']."</td>
                        <td>".$row['year']."</td>
                        <td>".$row['semester']."</td>
                        <td>".$row['student_count']."</td>
                        <td>".$row['TOPICID']."</td>
                        <td>".$row['TOPICNAME']."</td>
                        <td>".$p."</td>
                        </tr>
                    ");
            }
            echo "</tbody>";
        }
        else
        {
            //echo "Invalid Criteria!";
        }
    }
    
    