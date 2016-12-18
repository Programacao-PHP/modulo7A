<?php
require('d:/wamp/www/html2fpdf/html2fpdf.php');
$htmlfile="testex1.html";
$file=fopen($htmlfile,"r");
$size_of_file =filesize($htmlfile);
$buffer=fread($file,$size_of_file);
fclose($file);
$pdf=new html2fpdf();
$pdf->addpage();
$pdf->writehtml($buffer);
$pdf->output("testex1.pdf","F");
?>