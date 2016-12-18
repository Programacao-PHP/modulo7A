<?
require('d:/wamp/www/html2fpdf/html2fpdf.php');
//define('FPDF_FONTPATH','D:/wamp/www/html2fpdf/font/');
//require('d:/wamp/www/html2fpdf/fpdf.php'); 
$pdf=new HTML2FPDF();
$pdf->AddPage();
$fp = fopen("mytitle.htm","r");
$strContent = fread($fp, filesize("mytitle.htm"));
fclose($fp);
$pdf->WriteHTML($strContent);
$pdf->Output("teste.pdf", "I");
echo "PDF file is generated successfully!";
?>