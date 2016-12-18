<?php
	$expira=mktime(0,0,0,1,1,2005);
	setcookie('nome_cookie', 'valor_cookie', $expira, '~/minha_directoria', '.servidor.com');
	
	print_r($_COOKIE['nome_cookie']);
?>

