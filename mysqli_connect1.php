<?php
    /** 
		Data: 06-10-2015
		Ficheiro de configuração, cria e seleciona a base de dados 
	*/

	// Definição das constantes para acesso à base de dados
    define('DB_USER', 'adelino');		// nome do utilizador com acesso à base de dados
    define('DB_PASSWORD', '12345');		// password de acesso à base de dados		
    define('DB_HOST', 'localhost');		// nome do servidor
    define('DB_NAME', 'sitename');		// nome da base de dados

	// Ligação ao servidor MySQL
	// O símbolo @ evita detalhes das mensagens de erro
    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) OR die('Problemas na ligação ao servidor MySQL: ' . mysqli_connect_error());

	// seleciona a base de dados no servidor
	mysqli_select_db($dbc, DB_NAME) or die("A base de dados não existe");

	mysqli_set_charset($dbc, "utf8");	// permite corrigir os caracteres com cedilhas na visualização dos campos

	/*
	
		Outra forma de realizar a mesma operação
		$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if(mysqli_connect_error())
		{
			echo "Erro ao conectar com o servidor";
			exit;
		}
	*/
?>