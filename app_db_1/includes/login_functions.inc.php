<?php

/* Esta função define a URL (caminho absoluto) até ao ficheiro guardado em $pagina
	@$pagina - página
 */
function url_absoluto ($pagina = 'index.php') 
{

	// Inicia a definição da URL URL...
	// URL inicia com http:// mais o nome do host e o diretório corrente
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	// Retira espaço em branco (ou outros caracteres) no final da string $url
	// Pretendemos remover os caracteres / ou \. Como o caractere \ é escape em PHP temos que fazer \\
	$url = rtrim($url, '/\\');
	
	// Adiciona o nome da página:
	$url .= '/' . $pagina;
	
	return $url;

}


/**
 * Esta função valida dos dados do formulário (o email e a password).
 * Se ambos estiverem presentes então verifica a existência dos dados na tabela.
 */
function check_login($dbc, $email = '', $pass = '') 
{

	$erros = array(); // Inicializa o array dos erros
	
	// Valida o endereço de email
	if (empty($email)) 
	{
		$erros[] = 'Não inseriu o endereço de email.';
	} else {
		// faz o escape da variável $email
		$e = mysqli_real_escape_string($dbc, trim($email));
	}
	
	// Valida a password
	if (empty($pass)) 
	{
		$erros[] = 'Não inseriu a password.';
	} else {
		// faz o escape da variável $pass
		$p = mysqli_real_escape_string($dbc, trim($pass));
	}

	// verifica se o array erros está vazio, sinal de que não há erros
	if (empty($erros)) 
	{ // não há erros

		// comando SQL que verifica se o login e a password existem na tabela utilizadores
		$sql = "SELECT user_id, user_nome FROM utilizadores WHERE user_email='$e' AND user_senha=SHA1('$p')";	
		
		// executa o comando  SQL e guarda os resultados na variável resultados
		$resultado = @mysqli_query ($dbc, $sql);
		
		// devolve o nº de resultados da query
		if (mysqli_num_rows($resultado) == 1) // utilizador está registado
		{
		
			// Extrai o registo encontrado na tabela utilizadores com o nome dos campos
			$registo = mysqli_fetch_array ($resultado, MYSQLI_ASSOC);
			
			// Devolve dois valores: true e o registo encontrado na tabela utilizadores
			return array(true, $registo);
			
		} else {
			// O resultado da query não devolveu nenhum registo
			$erros[] = 'O email e a senha não existem na base de dados.';
		}
		
	}
	
	// Devolve dois valores:  false e os erros encontrados
	return array(false, $erros);

}

?>
