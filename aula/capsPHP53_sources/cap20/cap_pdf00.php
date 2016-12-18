<?php 
define('FPDF_FONTPATH','D:/wamp/www/fpdf/classe/font/');
require('d:/wamp/www/fpdf/classe/fpdf.php'); 

$pdf=new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('times','B',16); 
$pdf->Cell(40,10,'Criação de PDFs com PHP'); 
$pdf->Output(); 
?> 