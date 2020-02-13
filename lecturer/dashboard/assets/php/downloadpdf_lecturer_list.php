<?php
include 'database.php';
$cmd = $conn->prepare("SELECT name, email, mobile FROM lecturer ORDER BY name DESC");
$cmd->execute();
$result = $cmd->get_result();
if($result->num_rows > 0){
$header = array('Name', 'Email', 'mobile');

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',25);		
$pdf->Write(5,'Lecturer List');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','B',9);	
	foreach($header as $column_heading){
		$pdf->Cell(60,8,$column_heading,1);
	}

foreach($result as $row) {
	$pdf->SetFont('Arial','',9);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(60,8,$column,1);
}
$pdf->Output('D','Lecture_list.pdf','false');
}else{
header('Location: ../../reports.php');
}
?>