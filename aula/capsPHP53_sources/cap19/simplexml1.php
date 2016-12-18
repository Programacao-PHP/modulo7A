<?php
	// ler o documento XML do filesystem
	$ex1 = simplexml_load_file("bi.xml");
	// instanciar o documento XML directamente no código
	$xmld = <<<XML
<?xml version='1.0'?>
<bi>
	<nome>Carlos Serrao</nome>
	<morada>Lisboa</morada>
	<filiacao>
		<pai>Nome do Pai</pai>
		<mae>Nome da Mae</mae>
	</filiacao>
	<dt_validade>10/06/2026</dt_validade>
</bi>

XML;
	$ex2 = simplexml_load_string($xmld);
		
?>
