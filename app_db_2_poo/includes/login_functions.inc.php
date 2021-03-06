<?php

// This page defines two functions used by the login/logout process.

/* Esta função determina e devolve uma URL (caminho absoluto).
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
 * Se ambos estiverem presentes então verifica a existência dos dados na base de dados.
 */
function check_login($dbc, $email = '', $pass = '') 
{

	$erros = array(); // Inicializa o array dos erros
	
	// Valida o endereço de email
	if (empty($email)) 
	{
		$erros[] = 'Não inseriu o endereço de email.';
	} else {
		$e = $dbc->real_escape_string(trim($email));
	}
	
	// Valida a password
	if (empty($pass)) 
	{
		$erros[] = 'Não inseriu a password.';
	} else {
		$p = $dbc->real_escape_string(trim($pass));
	}

	if (empty($erros)) 
	{ // se o array estiver vazio então não há erros

		$sql = "SELECT user_id, user_nome FROM utilizadores WHERE user_email='$e' AND user_senha=SHA1('$p')";		
		$result = $dbc->query ($sql);
		
		if($dbc->errno) die($dbc->error);
		
		// devolve o nº de resultados do comando SELECT
		if ($result->num_rows == 1) // utilizador está registado
		{
		
			// Extrai o registo, pode-se utilizar os dois modo. 
			$registo = $result->fetch_assoc ();
			//$registo = $result->fetch_array ();
			
			/*
				Podemos ter
				while($registo = $result->fetch_assoc ()){
					echo $registo['user_id'] . "<br>";
					echo $registo['user_nome'] . "<br>";
				}
				
				while($registo = $result->fetch_array ()){
					echo $registo[0] . "<br>";
					echo $registo[1] . "<br>";
				}
			*/
			
			// Devolve dois valores: true e o registo encontrado na base de dados
			return array(true, $registo);
			
		} else {
			$erros[] = 'O email e a senha não existem na base de dados.';
		}
		
	}
	
	// Devolve dois valores:  false and e os erros encontrados
	return array(false, $erros);

}

?>
