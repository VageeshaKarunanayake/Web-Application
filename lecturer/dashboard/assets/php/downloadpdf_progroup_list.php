<?php
include 'database.php';
$id=$_GET['mod'];
$cmd = $conn->prepare("SELECT id,name,student_count FROM groups WHERE course = '$id' AND prorata = '1'");
$cmd->execute();
$result = $cmd->get_result();
if($result->num_rows > 0){
$header = array('Id','Name', 'student_count');

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L','','');
$pdf->SetFont('Arial','B',18);		
$pdf->Write(5,'PRORATA GROUPS LIST');
	$pdf->Ln();
	$pdf->Ln();
$pdf->SetFont('Arial','B',9);		

	foreach($header as $column_heading){
		$pdf->Cell(34,8,$column_heading,1);
	}

foreach($result as $row) {
	$pdf->SetFont('Arial','',9);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(34,8,$column,1);
}
}else{
header('Location: ../../reports.php?error=empty');
}
//set student id and group id to next page
$pdf->AddPage('L','','');
$pdf->SetFont('Arial','B',18);
$pdf->Write(5,'PRORATA GROUPS STUDENT LIST');
	$pdf->Ln();
	$pdf->Ln();
$pdf->SetFont('Arial','B',9);
 $header = array('group id','student id');
     foreach($header as $column_heading){
		$pdf->Cell(34,8,$column_heading,1);
	}
$cmd = $conn->prepare("SELECT * FROM groups WHERE course = '$id' AND prorata = '1'");
$cmd->execute();
$result = $cmd->get_result();
 while($row = $result->fetch_assoc()){
        $gid=$row['id'];
$cmdt = $conn->prepare("SELECT * FROM groups_students WHERE gid = '$gid'");
$cmdt->execute();
$results = $cmdt->get_result();
 while($rows = $results->fetch_assoc()){
        $gid=$rows['gid'];
        $students[]=$rows['sid'];
        
 $sdata=implode("\n", $students); 
$data=array($gid,$sdata);

	foreach($results as $rowt) {
	$pdf->SetFont('Arial','',9);	
	$pdf->Ln();
	foreach($rowt as $column)
		$pdf->Cell(34,8,$column,1);
	
}
 }
 }
$pdf->Output('D','prorata_group_list.pdf','false');

?>