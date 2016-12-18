<?php 
define('FPDF_FONTPATH','D:/wamp/www/fpdf/classe/font/');
require('D:/wamp/www/fpdf/classe/fpdf.php');

$pdf=new FPDF('P','cm','A4'); 
$pdf->AddPage();
$pdf->SetFont('Arial','B',18); 
$pdf->Cell(20,10,'TESTE - criaчуo de 1 documento PDF!', 0,0 ,'C'); 
$pdf->Output();
$pdf->Output('teste.pdf'); 
?>