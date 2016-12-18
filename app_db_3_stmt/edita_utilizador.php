<?php

// Esta página atualiza a informação de um utilizador.
// Esta pa´gina está acesível a partir de ver_utilizadores.php.

$page_title = 'Edita Utilizador';
include ('includes/header.php');

echo '<h1>Edita Utilizador</h1>';

// Verifica a validade do user_id através de um GET ou POST
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From ver_utilizadores.php
	$id = $_GET['id'];
	
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
	
} else { // O ID não é válido
	echo '<p class="erro">Esta página não é acessível.</p>';
	include ('includes/footer.php'); 
	exit();
}


require_once ('../ligaDB.php'); 


/* 
	Verifica se o formulário foi submetido
	Não entra neste IF caso o ID seja enviado pelo método GET
*/
if (isset($_POST['enviado'])) {

	$errors = array();
	
	if (empty($_POST['nome'])) {
		$errors[] = 'Deve inserir o nome.';
	} else {
		$nome = mysqli_real_escape_string($dbc, trim($_POST['nome']));
	}
	
	if (empty($_POST['apelido'])) {
		$errors[] = 'Deve inserir o apelido.';
	} else {
		$apelido = mysqli_real_escape_string($dbc, trim($_POST['apelido']));
	}
	
	if (empty($_POST['email'])) {
		$errors[] = 'Deve inserir o endereço de email.';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (empty($errors)) 
	{
	
		//  Testa se o endereço de email é único
		$q = "SELECT user_id FROM utilizadores WHERE user_email='$email' AND user_id != $id";
		
		$r = @mysqli_query($dbc, $q);
		
		// Verifica se o email, para aquele utilizador, está registado
		if (mysqli_num_rows($r) == 0) 
		{

			// atualiza o registo
			$q = "UPDATE utilizadores SET user_nome='$nome', user_apelido='$apelido', user_email='$email' WHERE user_id=$id LIMIT 1";
			
			$r = @mysqli_query ($dbc, $q);
			
			if (mysqli_affected_rows($dbc) == 1) 
			{
				echo '<p>O utilizador foi atualizado.</p>';	
							
			} else {
				echo '<p class="erro">O utilizador não foi alterado. As nossas desculpas.</p>';
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
			}
				
		} else {
			echo '<p class="erro">O endereço de email já se encontra registado.</p>';
		}
		
	} else { // Mostra os erros que ocorreram
	
		echo '<p class="erro">Ocorreram os erros:<br />';
		foreach ($errors as $msg) 
		{
			echo " - $msg<br />\n";
		}
		echo '</p><p>Tente novamente.</p>';
		
	}

}

// Mostra sempre o formulário

$q = "SELECT user_nome, user_apelido, user_email FROM utilizadores WHERE user_id=$id";

$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) 
{
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
    echo '<p>Nome: <input type="text" name="nome" size="15" maxlength="15" value="' . $row[0] . '" /></p>';
    echo '<p>Apelido: <input type="text" name="apelido" size="15" maxlength="30" value="' . $row[1] . '" /></p>';
    echo '<p>Email: <input type="text" name="email" size="20" maxlength="40" value="' . $row[2] . '"  /> </p>';
    echo '<p><input type="submit" name="submit" value="Enviar" /></p>';
    echo '<input type="hidden" name="enviado" value="TRUE" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '</form>';

} else { // O ID do utilizador não existe
	echo '<p class="erro">Página não está acessível.</p>';
}

mysqli_close($dbc);
		
include ('includes/footer.php');
?>
