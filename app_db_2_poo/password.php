<?php #

/*
    Date: 18/08/2015
    Author: Adelino Amaral
    Description: Esta página altera a senha atual associada a um email.
*/

$page_title = 'Altere a sua Senha';
include ('includes/header.php');

// Verifica se o formulário foi enviado:
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	require_once ('../ligaDB.php'); // Connect to the db.
		
    /*
        Verificação de erros de introdução no formulário
    */
	$erros = array(); // Inicializa o array.
	
	if (empty($_POST['email'])) {
		$erros[] = 'Esqueceu-se de inserir o seu email.';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (empty($_POST['pass'])) {
		$erros[] = 'Esqueceu-se de inserira senha antiga.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}

	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$erros[] = 'As senhas não coincidem.';
		} else {
			$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$erros[] = 'Não inseriu a nova senha.';
	}
	
	if (empty($erros)) {
        // verifica se a senha antiga e o email existem
		$q = "SELECT user_id FROM utilizadores WHERE (user_email='$email' AND user_senha=SHA1('$p') )";
		$r = @mysqli_query($dbc, $q);
		
		$num = @mysqli_num_rows($r);
		if ($num == 1) 
        {  // o utilizador está registado
		
			// Get the user_id:
			$row = mysqli_fetch_array($r, MYSQLI_NUM);

			// atualiza a senha com o novo valor inserido
			$q = "UPDATE utilizadores SET user_senha=SHA1('$np') WHERE user_id=$row[0]";		
			$r = @mysqli_query($dbc, $q);
			
			if (mysqli_affected_rows($dbc) == 1) { // Se foi afetada/atualizada uma linha
			
				echo '<h1>Obrigado!</h1>
				<p>A sua senha foi atualizada.</p><p><br /></p>';	
			
			} else {
			
				echo '<h1>Erro no sistema</h1>
				<p class="erro">Ocorreu um erro no sistema, pedimos desculpa.</p>'; 
				
				// Debugging message:
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
				
			}

			include ('includes/footer.php'); 
			exit();
				
		} else { // Há problemas com os dados na base de dados, ou os dados não existem ou há email e senha repetidos
			echo '<h1>Erro!</h1>
			<p class="erro">O email e a senha não foram guardados.</p>';
		}
		
	} else { // Os dados do formulário estão incorretos
	
		echo '<h1>Erro!</h1>
		<p class="erro">Ocorreram o(s) seguinte(s) erro(s):<br />';
		foreach ($erros as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
        
		echo '</p><p>Tente novamente.</p><p><br /></p>';
		
	}

	mysqli_close($dbc); // fecha a ligação à base de dados.
		
}

?>

<h1>Altere a sua senha</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<p>Endereço de Email: <input type="text" name="email" size="20" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Senha Antiga: <input type="password" name="pass" size="10" maxlength="20" /></p>
	<p>Nova Senha: <input type="password" name="pass1" size="10" maxlength="20" /></p>
	<p>Confirme Nova Senha: <input type="password" name="pass2" size="10" maxlength="20" /></p>
	<p><input type="submit" name="submit" value="Alterar a Senha" /></p>
</form>

<?php
include ('includes/footer.php');
?>
