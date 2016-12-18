<?php
	// ler o documento XML do filesystem
	$ex1 = simplexml_load_file("lista.xml");
	
	// grava o documento integral
	file_put_contents("novalistadebis.xml", $ex1->asXML());
	
	// gravar apenas o terceiro BI da lista
	file_put_contents("3obi.xml", $ex1->bi[2]->asXML());
		
?>
