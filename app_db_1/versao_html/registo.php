<?php

$page_title = 'Registo';
include ('includes/header.php');

// Verifica se o formulário foi enviado:
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

		
	// Inicializa o array que guarda os erros detetados.
	$erros = array();
	
	if (empty($_POST['nome'])) {
		$erros[] = 'Esqueceu-se de preencher o nome.';
	} else {
        
	}
	
	if (empty($_POST['apelido'])) {
		$erros[] = 'Esqueceu-se de preencher o apelido.';
	} else {
		
	}
	
	if (empty($_POST['email'])) {
		$erros[] = 'Esqueceu-se de preencher o endereço de email.';
	} else {
		
	}
	
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$erros[] = 'As senhas não são iguais.';
		} else {
			
		}
	} else {
		$erros[] = 'Não inseriu a senha.';
	}

	
	if (empty($erros)) 
    {
        // Não ocorreram erros no formulário
        echo "Resultado do nome $nome";
	
 
		

		
	} else { // Ocorreram erros no formulário
	
		echo '<h1>Erro!</h1>
			  <p class="erro">Ocurreram o(s) seguinte(s) erro(s) :<br />';
		
		foreach ($erros as $msg) {
			echo " - $msg<br />\n";
		}	
		echo '</p><p>Tente de novo.</p><p><br /></p>';
		
	}
	


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