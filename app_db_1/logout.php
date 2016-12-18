<?php

	session_start(); 	// acede à sessão existente.

	if (!isset($_SESSION['user_id'])) {	// a sessão não existe

		require_once ('includes/login_functions.inc.php');
		$url = url_absolute();		// caminho do index.php
		header("Location: $url");	// redireciona para o ficheiro inbdex.php
		exit();

	} else { // a sessão existe, logo vai ser eliminada.

		/*
		 * Não deve atribuir o valor NULL à $_SESSION.
		*/

		$_SESSION = array();	// limpa as variáveis de sessão

		session_destroy();		// destrói a  sessão

		setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);	// apaga o cookie
	}


	$page_title = 'Logged Out!';
	include ('includes/header.inc.php');

	echo "<h1>Terminou a sua sessão!</h1>";

	include ('includes/footer.inc.php');
?>
