<?php

	// define o título da página HTML
	$page_title = 'Enviar Mensagem';
	// inclui o cabeçalho na página
	include ('includes/header.inc.php');


	// Verifica se o formulário foi enviado (submetido)
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		/*
			O email será enviado se o ficheiro de configuração php.ini indicar os
			parâmetros corretos do servidor de email e à mailbox que serão utilizados.

			...
			[mail function]
			SMTP=nome do servidor de email (mail.pipocas.pt)
			sendmail_form=twoangels@sapo.pt
			;sendmail_path=só para servidores unix
		*/

		mail($_POST['emaildestino'], $_POST['assunto'], $_POST['mensagem'], "From: " . $_POST['meuemail']);

		echo "Esta mensagem foi enviada para " . $_POST['emaildestino'];

		// inclui o rodapé na página
		include ('includes/footer.inc.php');
	}
?>

		<h3>Escreva a sua Mensagem</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<input type="hidden" name="emaildestino" value="<?php echo $_GET['email']; ?>">
		<table width="100%" border="0">
		  <tr>
			<td class="col">Assunto:</td>
			<td><input type="text" name="assunto" size="20" maxlength="80" /></td>
		  </tr>
		  <tr>
			<td class="col">Meu Email:</td>
			<td><input type="text" name="meuemail" size="20" maxlength="60" /></td>
		  </tr>
		  <tr>
			<td class="col">Mensagem:</td>
			<td><textarea name="mensagem" cols="40" rows="10"></textarea></td>
		  </tr>

		  <tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Enviar Email">
			</td>
		  </tr>
		</table>

    </form>
