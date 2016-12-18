<?php
function data_actual_portugues() {
	/* escreve a data em formato dia_da_semana, dia_do_mês de mês, ano */ 
	$d2p = getdate(time());

	switch($d2p["weekday"]) {
		case "Monday": $dds = "2ª Feira"; break;
		case "Tuesday": $dds = "3ª Feira"; break;
		case "Wednesday": $dds = "4ª Feira"; break;
		case "Thursday": $dds = "5ª Feira"; break;
		case "Friday": $dds = "6ª Feira"; break;
		case "Saturday": $dds = "Sábado"; break;
		case "Sunday": $dds = "Domingo"; break;
	}

	switch($d2p["month"]) {
		case "January": $mes = "Janeiro"; break;
		case "February": $mes = "Fevereiro"; break;
		case "March": $mes = "Março"; break;
		case "April": $mes = "Abril"; break;
		case "May": $mes = "Maio"; break;
		case "June": $mes = "Junho"; break;
		case "July": $mes = "Julho"; break;
		case "August": $mes = "Agosto"; break;
		case "September": $mes = "Setembro"; break;
		case "October": $mes = "Outubro"; break;
		case "November": $mes = "Novembro"; break;
		case "December": $mes = "Dezembro"; break;
	}
	
	$data = sprintf("%s, %d de %s, %d", $dds, $d2p["mday"], $mes, $d2p["year"]);
	return $data;
}

printf("<h2>Hoje é %s.</h2>", data_actual_portugues());
?>
