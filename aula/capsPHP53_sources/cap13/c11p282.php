<?php
	$dia_aniversario = mktime(19, 45, 0, 3, 10, 1975);
	$dia_aniversario_formatado = date('F d, Y - g:i a', $dia_aniversario);
	echo "O Jorge faz anos em $dia_aniversario_formatado.";
?>