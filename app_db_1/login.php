<?php

// Esta página gera o processo de login. O sucesso do login implica do redirecionamento da página.
// Caso o formulário tenha sido submetido ou não, o ficheiro login_page.inc.php deve ser carregado.


// Testa se o formulário foi submetido
if (isset($_POST['enviado'])) 
{	// O formulário foi submetido, este encontra-se no ficheiro login_page.inc.php

	require_once ('includes/login_functions.inc.php');
	
	require_once ('../ligaDB.php');
	
		
	// verifica os dados do login na tabela utilizadores
	// A função list() cria duas variáveis, (true + registo) ou (false + erros)
	list ($check, $dados) = check_login($dbc, $_POST['email'], $_POST['pass']);
	
	// Verifica se o utilizador é válido
	if ($check) 
	{ // OK!, o utilizador foi encontado na tabela utilizadores
		
		// Cria/inícia uma sessão
		session_start();
		
		// apagar as variáveis de sessão anteriores para não ocorrer problemas
		unset($_SESSION["user_id"],
				$_SESSION["user_nome"],
			  	$_SESSION['agent']
			 );
		
		// Criar novas variáveis de sessão sessão
		$_SESSION["user_id"] = $dados["user_id"];
		$_SESSION["user_nome"] = $dados["user_nome"];
		

		// Guardar o HTTP_USER_AGENT - string que faz referência ao browser
		// serve para prevenir hijacking
		$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
		
		
		// Redireciona para a página loggedin.php
		// Se não passar um valor como parâmetro, a função url_absoluto redireciona para a página index.php
		$url = url_absoluto ('loggedin.php');
		header("Location: $url");
		exit(); // Sai do script.
			
	} else { // problema na verificação do login e senha

		$errors = $dados;	// $dados guarda os erros

	}
		
	mysqli_close($dbc); // Fecha a conexão à base de dados.

}

// Se o formulário não foi submetido então cria o formulário do login
include ('includes/login_page.inc.php');
?>
