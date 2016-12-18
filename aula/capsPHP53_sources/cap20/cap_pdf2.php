<?php 
define('FPDF_FONTPATH','D:/wamp/www/fpdf/classe/font/');
require('d:/wamp/www/fpdf/classe/fpdf.php'); 

class PDF extends FPDF 
{ 
//Cabeçalho
function Header() 
{ 
//Logo 
$this->Image('logo_pb.png',10,8,33); 
//Arial bold 15 
$this->SetFont('Arial','BU',15); 
//Mover para a direita 
$this->Cell(80); 
//Titulo
$this->Cell(30,10,'Título',1,0,'C'); 
//espessura da linha
$this->SetLineWidth(0.5);
//cor da linha
$this->SetDrawColor(0,200,100);
//traçado da linha
$this->Line(10,25,200,25);
//Line break 
$this->Ln(20); 

} 

//Rodapé
function Footer() 
{ 
//Posição - 1.5 cm a partir do fundo  
$this->SetY(-40); 
//Arial italic 8 
$this->SetFont('times','IU',8); 
//Numero  de página
$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C'); 
} 
} 

//Instanciação da classe
$pdf=new PDF(); 
$pdf->open();
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','',12); 
for($i=1;$i<=15;$i++) 
$pdf->Cell(0,5,'A imprimir a linha nº '.$i,0,1); 
$pdf->Image('logo1.jpg',95,50,25,20);
$pdf->Output(); 
?> 