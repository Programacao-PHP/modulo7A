<?php
function processa_formulario() {
	global $dds;
	global $mes;
	global $dia;
	global $ano;
	$timestamp=mktime(0,0,0,$mes,$dia,$ano);

	$proximo_dds='';
	$proximo_timestamp=$timestamp;

	while($proximo_dds!=$dds) {
		$proximo_timestamp+=86400;
		$proximo_dds=date('I', $proximo_timestamp);
	}

	$proximo_formatado=date('F d, Y', $timestamp);
	$proximo_formatado=date('F d, Y', $proximo_timestamp);
	echo "A primeira $dds após $primeira_formatada é $proxima_formatada";
}
?>

