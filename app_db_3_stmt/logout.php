<?php

session_start(); 	// acede à sessão existente.

// Se o cookie não está presente entã direciona o utilizador redirect the user:
if (!isset($_SESSION['user_id'])) {

	require_once ('includes/login_functions.inc.php');
	$url = url_absolute();	// caminho do index.php
	header("Location: $url");
	exit();
	
} else { // elimina a sessão.
	
	/*
	 * Não deve atribuir o valor NULL à $_SESSION, nem usar unset($_SESSION)
	 * pode causar problemas em alguns servidores.
	*/
	
	$_SESSION = array();	// limpa as variáveis de sessão
	
	session_destroy();		// destrói a  sessão
	
	setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);	// apaga o cookie
}


$page_title = 'Logged Out!';
include ('includes/header.php');

echo "<h1>Terminou a sua sessão!</h1>";

include ('includes/footer.php');
?>
