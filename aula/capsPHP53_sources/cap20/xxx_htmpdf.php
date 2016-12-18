<?php
require('d:/wamp/www/html2fpdf/html2fpdf.php');
$htmlFile = "testex.html";
$file = fopen($htmlFile,"r");
$size_of_file = filesize($htmlFile);
$buffer = fread($file, $size_of_file);
fclose($file);
$pdf=new HTML2FPDF();
$pdf->AddPage();
//Code below used only if you want relative links to be understood
//$pdf->setBasePath(dirname(__FILE__)."\".$htmlFile);//insert full path where html is
$pdf->WriteHTML($buffer);
$pdf->Output(); 
?>