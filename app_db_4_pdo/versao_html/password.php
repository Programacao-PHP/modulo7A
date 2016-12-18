<?php

$page_title = 'Altere a sua Senha';
include ('includes/header.php');

// Verifica se o formulário foi enviado:
if ($_SERVER["REQUEST_METHOD"] == "POST") {

		
    /*
        Verificação de erros de introdução no formulário
    */
	$erros = array(); // Inicializa o array.
	
	if (empty($_POST['email'])) {
		$erros[] = 'Esqueceu-se de inserir o seu email.';
	} else {
	
	}
	
	if (empty($_POST['pass'])) {
		$erros[] = 'Esqueceu-se de inserira senha antiga.';
	} else {
		
	}

	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$erros[] = 'As senhas não coincidem.';
		} else {
			
		}
	} else {
		$erros[] = 'Não inseriu a nova senha.';
	}

		
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
