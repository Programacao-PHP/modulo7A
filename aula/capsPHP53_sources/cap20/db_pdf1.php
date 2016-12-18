<?php
define('FPDF_FONTPATH','D:/wamp/www/fpdf/classe/font/');
require('d:/wamp/www/fpdf/classe/fpdf.php'); 
$pdf=new FPDF('P','mm','A4'); 
$larg_camp=0;

class PDF extends FPDF
{
function Table($col,$sql)
{
    global $conn;

//Resultados-Query
    $res=sqlite_query($conn,$sql);
    if(!$res)
        die('Erro na BD SQLite');
	$campos=sqlite_num_fields($res);
	$larg_camp=array(20,45,40,20);
	$larg=$larg_camp[0]+$larg_camp[1]+$larg_camp[2]+$larg_camp[3];	
//Header da tabela
    $this->SetFillColor(255,48,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    $tw=0;
    $I=0;
    $fill=0;
	foreach($col as $label=>$width)
    {
		$this->Cell($larg_camp[$I],10,$label,1,0,'C',1);
		$I++;
    }
    $this->Ln();

//Linhas da tabela
    $this->SetFillColor(214,185,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    
	while($linha=sqlite_fetch_array($res))
    {
	   foreach($col as $field=>$width){}
        for ($I=0; $I<$campos; $I++) {
			$this->Cell($larg_camp[$I],6,$linha[$I],'LR',0,'L',$fill);
		}		
		$this->Ln();
        $fill=!$fill;
  }
	$this->Cell($larg,0,'','T');
}
}

$conn=sqlite_open('aaa'); 
if(!$conn)
die('Falha na ligação à base de dados');
$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();

$pdf->Image('logo_pb.png',150,10,33);
$pdf->SetLineWidth(0.5);
$pdf->SetDrawColor(0,200,200);
$pdf->Line(10,17,135,17);
$pdf->Ln(20); 

$pdf->SetFont('Arial','',14);
$sql='SELECT * From pdf_teste order by produto';
$pdf->Table(array('cod_id'=>$larg_camp[0],'Produto'=>$larg_camp[1],'Quantidade'=>$larg_camp[2], 'Valor'=>$larg_camp[3]),$sql);
$pdf->Output();
?>
