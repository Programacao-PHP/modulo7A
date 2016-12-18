<?php
	$expira=mktime(0,0,0,1,1,2000);
	setcookie('nome_cookie', 'valor_cookie', $expira);
	
	print_r($_COOKIE['nome_cookie']);
?>
