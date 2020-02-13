<?php
include 'database.php';
$id=$_GET['mod'];
$cmd = $conn->prepare("SELECT student.id AS stuid, student.name AS stuname, student.mobile, student.email, student.year, student.semester, student.prorata, student.gpa, course.name AS cname FROM (((student INNER JOIN groups_students ON student.id = groups_students.sid)INNER JOIN groups ON groups_students.gid = groups.id)INNER JOIN course ON groups.course = course.id) WHERE course.id = '$id' AND student.prorata = '1'");
$cmd->execute();
$result = $cmd->get_result();
if($result->num_rows > 0){
$header = array('Id','Name', 'Mobile', 'Email', 'Year', 'Semester', 'Prorata', 'GPA', 'Course_name');

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L','','');
$pdf->SetFont('Arial','B',18);		
$pdf->Write(5,'Prorata Student List');
	$pdf->Ln();
	$pdf->Ln();
$pdf->SetFont('Arial','B',8);		

	foreach($header as $column_heading){
		$pdf->Cell(31,8,$column_heading,1);
	}

foreach($result as $row) {
	$pdf->SetFont('Arial','',8);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(31,8,$column,1);
}
$pdf->Output('D','prorata_student_list.pdf','false');
}else{
header('Location: ../../reports.php?error=empty');
}
?>