<?php
$root="d:\wamp\www";
define('FPDF_FONTPATH',$root.'/fpdf/classe/font/');
require($root.'/fpdf/classe/fpdf.php');
$pdf=new FPDF('P','cm','A4'); 
#$pdf->Open(); 
$pdf->AddPage(); 
$pdf->SetMargins(2.5,2.5,3);
$pdf->SetTitle ("documento PHP/PDF");
$pdf->SetAuthor("Carlos/Joaquim");
$pdf->SetSubject('Criação de um documento PDF');
$pdf->SetFont('times','BIU',18);
$pdf->ln();
$pdf->Cell(0,1,'Utilização do FPDF',1,1,'C',0); 
$pdf->ln();
$pdf->SetFont('helvetica','I',14);
$texto="Este é um exercício para podermos criar documentos PDF com o recurso à classe FPDF do PHP. Aqui são utilizados vários métodos, que permitem uma formatação mais cuidada da página gerada dinamicamente.";
$pdf->MultiCell(0,0.5,$texto,1,'J');

$texto1="1º texto opcional a ser colocado em posição definida de acordo com os parâmetros";
$pdf->SetXY(5,8);
$pdf->Write(1,$texto1);
$pdf->ln();

$pdf->SetFont('times','BIU',12);
$texto2="2º texto facultativo";
$pdf->Write(1,$texto2);

$pdf->SetFont('helvetica','',14);
$texto3="3º texto de teste";
$pdf->SetY(12);
$pdf->Write(0.5,$texto3);
// o output tem comportamentos diferentes no IE e firefox
$pdf->Output("exemplo1.pdf", "I"); 
?>
