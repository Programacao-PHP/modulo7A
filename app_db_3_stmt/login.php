<?php

// Esta página gera o processo de login. O sucesso do login implica do redirecionamento da página.
// Caso o formulário tenha sido submetido ou não, o ficheiro login_page.inc.php deve ser carregado.


// Testa se o formulário foi submetido
if (isset($_POST['enviado'])) 
{	// O formulário foi submetido, este encontra-se no ficheiro login_page.inc.php

	require_once ('includes/login_functions.inc.php');
	
	require_once ('../ligaDB.php');
	
	// dados do formulário do login
	$email = $_POST['email'];
	$password = SHA1($_POST['pass']);
		
	// verifica os dados do login na base de dados
	$sql = "SELECT user_id, user_nome FROM utilizadores WHERE user_email = ? AND user_senha = ?";
	
	// guarda o objeto mysqli_stmt
	$resultado = mysqli_prepare($dbc, $sql);
	
	// unir os parâmteros da sentença sql
	$ok = mysqli_stmt_bind_param($resultado, "ss", $email, $password);
	
	// executa a consulta
	$ok = mysqli_stmt_execute($resultado);
	
	if($ok == false){
		echo "Erro ao executar a consulta";
	}
	else {
		// associa as variáveis ao resultado da consulta
		$ok = mysqli_stmt_bind_result($resultado, $userid, $usernome);
		
		// obtém os registos
		mysqli_stmt_fetch($resultado);
		
		session_start();
		
		// apagar as sessões anteriores
		unset($_SESSION["user_id"],
				$_SESSION["user_nome"],
			  	$_SESSION['agent']
			 );
		
		// Criar nova sessão com os dados das variáveis da consulta
		$_SESSION["user_id"] = $userid;
		$_SESSION["user_nome"] = $usernome;
		

		// Guardar o HTTP_USER_AGENT - string que faz referência ao browser

		// serve para prevenir hijacking
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		
		
		// Redireciona para a página
		$url = url_absoluto ('loggedin.php');
		header("Location: $url");
		exit(); // Sai do script.
		
		
		
		mysqli_stmt_close($resultado);
	}

		
	mysqli_close($dbc); // Fecha a conexão à base de dados.

}

// Se o formulário não foi submetido então cria o formulário do login
include ('includes/login_page.inc.php');
?>
