<?php
	/**
	*	O utilizador é direcionado para aqui vindo do ficheiro login.php
	**/

	session_start();

	// Se a sessão não está presente então direciona o utilizador
	// validar o HTTP_USER_AGENT
	if ( !isset($_SESSION['user_id']) || ( $_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) ) ) {

		require_once ( 'includes/login_functions.inc.php' );
		$url = url_absoluto();
		header("Location: $url");
		exit();

	}

	$page_title = 'Logged In!';
	include ('includes/header.php');

	echo "<h1>Logged In!</h1>
		  <p>Bem-vindo,<strong>" . $_SESSION['user_nome'] . "</strong>!</p>
		  <p><a href=\"logout.php\">Logout</a></p>";

	include ('includes/footer.php');
?>
