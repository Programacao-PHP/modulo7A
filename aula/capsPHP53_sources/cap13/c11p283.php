<?php

function apresenta_formulario() {
	$dds=array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
	$meses=array(1=>'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
?>
<FORM action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
Encontre o primeiro
<SELECT name="dds">
<?php
	for($i=0;$i<7;$i++) {
		echo "<OPTION value='$i'>$dds[$i]";
	}
	echo '</SELECT> depois de <SELECT name="mes">';
	
	for($i=1;$i<=12;$i++) {
		echo "<OPTION value='$i'>".$meses[$i];
	}
	echo '</SELECT><SELECT name="dia">';
	
	for($I=1;$I<=31;$I++) {
		echo "<OPTION>$I";
	}
	echo '</SELECT> <SELECT name="ano">';
	
	$ano_inicial=date('Y')-10;
	$ano_final=$ano_inicial+20;
	
	for($i=$ano_inicial;$i<=$ano_final;$i++) {
		echo "<OPTION>$i";
	}
	
	echo '<INPUT type="hidden" name="etapa" value="processamento">';
	echo '</SELECT> <INPUT type="submit" value="Executar"></FORM>';
}

function processa_formulario() {

	$timestamp = mktime(0,0,0,$_REQUEST['mes'],$_REQUEST['dia'],$_REQUEST['ano']);
	
	$proximo_dds='';
	$proximo_timestamp = $timestamp;
	
	while($proximo_dds != $_REQUEST['dds']) {
		$proximo_timestamp += 86400;
		$proximo_dds = date("d", $proximo_timestamp);
	}

	$primeira_formatada=date('F d, Y', $timestamp);
	$proxima_formatada=date('F d, Y', $proximo_timestamp);
	echo "A primeira ".$_REQUEST['dds']." após $primeira_formatada é $proxima_formatada";
}


 if(empty($_REQUEST['etapa'])){
	apresenta_formulario(); 
 }
 else {
	processa_formulario(); 
 }

?>
