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
    $dbc =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if($dbc->connect_errno){
		echo "Falhou a conexão cm a bas ede dados: " . $dbc->connect_errno;
	}

	$dbc->set_charset("utf8"); // permite corrigir os caracteres com cedilhas na visualização dos campos
?>