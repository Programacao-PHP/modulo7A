<?php 
define('FPDF_FONTPATH','D:/wamp/www/fpdf/classe/font/');
require('d:/wamp/www/fpdf/classe/fpdf.php'); 

$pdf=new FPDF('P','mm','A4'); 
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Id produto');
$pdf->SetX(35);
$pdf->Cell(60,5,'Produto');
$pdf->SetX(70);
$pdf->Cell(40,5,'Quantidade');
$pdf->SetX(100);
$pdf->Cell(40,5,'Valor Unitсrio');
$pdf->Image('logo_pb.png',150,10,33);
$pdf->SetLineWidth(0.5);
$pdf->SetDrawColor(0,200,200);
$pdf->Line(10,17,125,17);
$pdf->Ln(10); 

$dados=sqlite_open('d:\wamp\sqlitemanager\aaa') or die ("Falha na ligaчуo р base de dados\n");
$interrog="SELECT * FROM pdf_teste";
$resultado=sqlite_query($dados,$interrog);

while($linha = sqlite_fetch_array($resultado)){
$pdf->ln();
$pdf->SetX(20);
#$pdf->Cell(40,5,$linha[id]);
$pdf->Cell(40,5,$linha[0]);
$pdf->SetX(35);
#$pdf->Cell(60,5,$linha[produto]);
$pdf->Cell(60,5,$linha[1]);
$pdf->SetX(80);
#$pdf->Cell(40,5,$linha[quant]);
$pdf->Cell(40,5,$linha[2]);
$pdf->SetX(110);
#$pdf->Cell(40,5,$linha[valor]);
$pdf->Cell(40,5,$linha[3]);
}
sqlite_close($dados);
$pdf->Output();
?>