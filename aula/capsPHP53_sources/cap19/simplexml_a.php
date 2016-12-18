<?php
	// ler o documento XML do filesystem
	$ex1 = simplexml_load_file("bilhete_de_identidade.xml");
		echo "<b>Nome</b>:".$ex1->NOME."<br><br>";
		
	// instanciar o documento XML directamente no código
	$xmld = <<<XML
<?xml version='1.0'?>
<bi>
	<nome>Almerindo da Silva</nome>
	<morada>Arenques de Cima</morada>
	<filiacao>
		<pai>Joselito Silva</pai>
		<mae>Maria Patrocinia</mae>
	</filiacao>
	<dt_validade>10/06/2016</dt_validade>
</bi>

XML;
	$ex2 = simplexml_load_string($xmld);	
echo $ex2->asXML();
?>