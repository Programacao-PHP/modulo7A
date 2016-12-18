<?php

/*
    Date: 07/10/2015
    Author: Adelino Amaral
    Description: Este script insere registos na tabela utilizadores.
	
	Não evita registos repetidos. Verifica se o utilizador existe... 
	utilizar a função mysqli_num_rows() > 0 então regista...
*/

$page_title = 'Registo';
include ('includes/header.php');

// Verifica se o formulário foi enviado:
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// ligação ao servidor/base de dados MyDQL
	require_once ('../ligaDB.php');
		
	// Inicializa o array que guarda os erros detetados.
	$erros = array();
	
	if (empty($_POST['nome'])) {
		$erros[] = 'Esqueceu-se de preencher o nome.';
	} else {
        $nome = mysqli_real_escape_string($dbc, trim($_POST['nome']));
	}
	
	if (empty($_POST['apelido'])) {
		$erros[] = 'Esqueceu-se de preencher o apelido.';
	} else {
		$apelido = mysqli_real_escape_string($dbc, trim($_POST['apelido']));
	}
	
	if (empty($_POST['email'])) {
		$erros[] = 'Esqueceu-se de preencher o endereço de email.';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$erros[] = 'As senhas não são iguais.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
			$p = SHA1('$p');	// encripta a senha
		}
	} else {
		$erros[] = 'Não inseriu a senha.';
	}

	
	if (empty($erros)) 
    {
	
        // A função mysqli_real_escape_string evita problemas de SQL Injection.
		// A função SHA1() calcula a hash sha1 de uma string (codifica).
		$sql = "INSERT INTO utilizadores (user_nome, user_apelido, user_email, user_senha, user_dataregisto) ";
        //$sql .= "VALUES ('$nome', '$apelido', '$email', SHA1('$p'), NOW() )";
		$sql .= "VALUES (?, ?, ?, ?, NOW() )";
        
		// guarda o objeto mysqli_stmt
		$resultado = mysqli_prepare($dbc, $sql);
	
		// unir os parâmteros da sentença sql
		$ok = mysqli_stmt_bind_param($resultado, "ssss", $nome, $apelido, $email, $p);
	
		// executa a consulta
		$ok = mysqli_stmt_execute($resultado);
		
		if($ok == false){
			echo "Erro ao executar a consulta";
		}
		else {
			echo "Foi adicionado o novo registo $nome";	
		}
		
		
		
		// Fecha aligação à base de dados
		mysqli_close($dbc);

		include ('includes/footer.php'); 
		exit(0);
		
	} else { // Ocorreram erros no formulário
	
		echo '<h1>Erro!</h1>
			  <p class="erro">Ocurreram o(s) seguinte(s) erro(s) :<br />';
		
		foreach ($erros as $msg) {
			echo " - $msg<br />\n";
		}	
		echo '</p><p>Tente de novo.</p><p><br /></p>';
		
	}
	
	// Fecha aligação à base de dados
	mysqli_close($dbc);

	include ('includes/footer.php');
}
?>

    <h1>.:: Registo ::.</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

		<table width="100%" border="0">
		  <tr>
			<td class="col">Nome:</td>
			<td><input type="text" name="nome" size="15" maxlength="20" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" /></td>
		  </tr>
		  <tr>
			<td class="col">Apelido:</td>
			<td><input type="text" name="apelido" size="15" maxlength="40" value="<?php if(isset($_POST['apelido'])) echo $_POST['apelido']; ?>" /></td>
		  </tr>
		  <tr>
			<td class="col">Email:</td>
			<td><input type="text" name="email" size="20" maxlength="80" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></td>
		  </tr>
		  <tr>
			<td class="col">Senha:</td>
			<td><input type="password" name="pass1" size="10" maxlength="20" /></td>
		  </tr>
		  <tr>
			  <td class="col">Confirme:</td>
			  <td><input type="password" name="pass2" size="10" maxlength="20" /></td>
		  </tr>
		  <tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Enviar">
			</td>
		  </tr>
		</table>
		
    </form>