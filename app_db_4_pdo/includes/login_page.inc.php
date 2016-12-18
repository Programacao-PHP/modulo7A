<?php

// Esta página mostra os erros associados ao login
// e cria uma página com o formulário do login

$page_title = 'Login';
include ('includes/header.php');

// Mostra erros se existirem.
if (!empty($errors)) 
{
	echo '<h1>Erro!</h1>
	<p class="error">Ocorreram os erros:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Tente de novo.</p>';
}


?>
<h1>Iniciar sessão para continuar a utilizar o sistema</h1>
<form action="login.php" method="post">
	<table>
		<tr>
			<td>Endereço Email:</td>
			<td><input type="text" name="email" size="20" maxlength="80" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="pass" size="20" maxlength="20" /></td>
		</tr>
	</table>
	
	<p><input type="submit" name="submit" value="Login" /></p>
	<input type="hidden" name="enviado" value="TRUE" />
</form>


<?php
include ('includes/footer.php');
?>