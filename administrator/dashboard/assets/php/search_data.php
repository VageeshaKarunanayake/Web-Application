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
    elseif($type == "administrators")
    {
        echo(" <thead id='tableTH'>
                    <th data-field='state' data-checkbox='false'></th>
                    <th data-field='id' class='text-center'>ID</th>
                    <th data-field='name' data-sortable='true'>Name</th>
                    <th data-field='mobile' data-sortable='true'>Mobile</th>
                    <th data-field='email' data-sortable='true'>Email</th>
                </thead>
                <tbody>
            ");
            
        $cmd = $conn->prepare("SELECT * FROM admin");
        $cmd->execute();
        $result = $cmd->get_result();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo("<tr>
                        <td></td>
                        <td>".$row['username']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['mobile']."</td>
                        <td>".$row['email']."</td>
                        </tr>
                    ");
            }
            echo "</tbody>";
        }
        else
        {
            
        }
    }
    elseif($type == "lecturers")
    {
        echo(" <thead id='tableTH'>
                    <th data-field='state' data-checkbox='false'></th>
                    <th data-field='name' data-sortable='true'>Name</th>
                    <th data-field='email' data-sortable='true'>Email</th>
                    <th data-field='mobile' data-sortable='true'>Mobile</th>
                </thead>
                <tbody>
            ");
            
        $cmd = $conn->prepare("SELECT * FROM lecturer");
        $cmd->execute();
        $result = $cmd->get_result();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo("<tr>
                        <td></td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['mobile']."</td>
                        </tr>
                    ");
            }
            echo "</tbody>";
        }
    }
    else
    {
        //echo "Invalid Criteria!";
    }

    
    