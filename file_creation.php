<input name="download" type="submit" />

<?php
define('FPDF_FONTPATH','font/');

require('fpdf.php');

$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'om sai om om sai om om sai om om sai om om sai om om sai');
$pdf->Ln(2);
$pdf->Cell(40,10,'om sai om om sai om om sai om om sai om om sai om om sai');
$pdf->Output();
?>