<?php
define('FPDF_FONTPATH','D:/wamp/www/fpdf/classe/font/');
require('d:/wamp/www/fpdf/classe/fpdf.php'); 
$pdf=new FPDF('P','mm','A4'); 

class PDF_E extends FPDF
{
//Load data
function LoadData($file)
{
    //Read file lines
    $lines=file($file);
    $data=array();
    foreach($lines as $line)
        $data[]=explode(';',chop($line));
    return $data;
}

//Tabela colorida
function FancyTable($header,$data)
{
    //Cores, linhas e fonte
    $this->SetXY(30,40);
	$this->SetFillColor(255,128,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(255,128,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    //Header da tabela
    $w=array(40,35,40,50);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);
    $this->Ln();
    $this->SetX(30);
    //Restauro da fonte e cores
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
	//Data
    $fill=0;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill=!$fill;
        $this->SetX(30);
    }
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF_E();
//Titulos das colunas
$header=array('País','Capital','Area (km2)','População(milhares)');
//Dados
$data=$pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$link=$pdf->AddLink();
$pdf->Write(5,'DAR UM CLICK AQUI',$link);
$pdf->SetLink($link);
$pdf->Image('logo_pb.png',150,10,33,0,'','http://www.fpdf.org');

$pdf->Output();
?>