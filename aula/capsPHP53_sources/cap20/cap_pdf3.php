<?php 

define('FPDF_FONTPATH','D:/wamp/www/fpdf/classe/font/');
require('d:/wamp/www/fpdf/classe/fpdf.php'); 

class PDF_E extends FPDF 
{ 
function Header() 
{ 
global $title; 

$this->SetFont('times','B',12);
$this->Image('logo1.jpg',5,5,25,20);
//calcula o tamanho do texto e adiciona-lhe 16mm
$w=$this->GetStringWidth($title)+16; 
//calcula o ponto central na linha onde irá colocar o texto 
$this->SetX((210-$w)/2);  
$this->SetDrawColor(0,80,180); 
$this->SetFillColor(230,230,0); 
$this->SetTextColor(220,50,50); 
$this->SetLineWidth(1); 
$this->Cell($w,9,$title,1,1,'C',1); 
$this->SetLineWidth(0.5);
$this->SetDrawColor(0,200,100);
$this->Line(10,25,200,25); 
$this->Ln(10); 
} 

function Footer() 
{ 
$this->SetY(-15); 
$this->SetFont('times','I',8); 
$this->SetTextColor(128); 
$this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C'); 
} 

function CorpoTexto($file) 
{ 
//Leitura de ficheiro TXT
$this->SetFillColor(200,220,255); 
$this->Cell(0,6,"Histórico & Cantos",0,1,'L',1); 
$this->Ln(10);
$f=fopen($file,'r'); 
$txt=fread($f,filesize($file)); 
fclose($f); 
$this->SetFont('Times','',10); 
$this->MultiCell(0,5,$txt,0,'L'); 
$this->Ln(); 
$this->SetFont('','I'); 
$this->Cell(0,5,'(fim do excerto)'); 
} 

function Imprimir($file) 
{ 
$this->AddPage(); 
$this->open(); 
$this->CorpoTexto($file); 
} 
} 

$pdf=new PDF_E(); 
$title='Os Lusiadas'; 
$pdf->SetTitle($title);
$pdf->SetFont('Arial','B',12); 
$pdf->SetAuthor('Os Lusiadas-Luis de Camoes'); 
$pdf->Imprimir('camoes.txt'); 
$pdf->Output(); 
?> 