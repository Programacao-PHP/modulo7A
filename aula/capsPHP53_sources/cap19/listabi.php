
<?php
	// ler o documento XML do filesystem
	$ex1 = simplexml_load_file("lista.xml");
	
	
	// aceder directamente a um nome especifico
	echo "<b>Nome</b>:".$ex1->bi[0]->nome."<br><br>";

	// percorrer os vários BIs e escrever os nomes
	foreach ($ex1->bi as $mbi) {
		// permite-me que possa percorrer cada um dos elementos da estrutura
		echo "<b>Nome</b>:".$mbi->nome."<br>";
	}
	
	// escrever a data de emissão (atributo) e o arquivo de um BI específico
	echo "Data de emissão: ".$ex1->bi[0]->arq_id['data_emissao']."</br>";
	
	echo "em: ".$ex1->bi[0]->arq_id."<br>";
		
?>
