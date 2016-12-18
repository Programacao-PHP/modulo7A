<?php

// Esta página remove um registo na tabela utilizadores

$page_title = 'Apaga Utilizador';
include ('includes/header.inc.php');

echo '<h1>Apaga Utilizador</h1>';


/*
	verifica se o id do utilizador é válido, através do método GET ou POST.
	Identifica o ID
*/
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) 
{ // Origem: ver_utilizadores.php
	
	$id = $_GET['id'];
	
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // submissão do form deste ficheiro
	$id = $_POST['id'];
	
} else { // o id não é válido
	echo '<p class="erro">Esta página não está acessível.</p>';
	include ('includes/footer.php'); 
	exit();
}


require_once ('../ligaDB.php');

/*
	Verifica se o formulário foi submetido
*/
if (isset($_POST['enviado'])) 
{

	if ($_POST['confirma'] == 'Sim') 
	{ // Apaga o registo

		$sql = "DELETE FROM utilizadores WHERE user_id=$id LIMIT 1";
		
		$r = @mysqli_query ($dbc, $sql);
		
		// mysqli_affected_rows() - devolve quantas linhas foram afetadas quando se executou a eliminação
		if (mysqli_affected_rows($dbc) == 1) 
		{
		
			echo '<p>O utilizador foi eliminado.</p>';	
		
		} else {
			echo '<p class="erro">O utilizador não foi eliminado. Existe um problema no sistema</p>';
			// O utilizador a eliminar poderá não existir na base de dados
			echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $sql . '</p>';
		}
	
	} 
	else // $_POST['confirma'] == 'Nao'
	{
		echo '<p>O utilizador não foi eliminado.</p>';	
	}

} else { // Mostra formulário

	$sql = "SELECT CONCAT(user_apelido, ', ', user_nome) FROM utilizadores WHERE user_id=$id";
	
	$r = @mysqli_query ($dbc, $sql);
	
	if (mysqli_num_rows($r) == 1) 
	{

		// Obtém informação do utilizador
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
		echo '<h3>Nome: ' . $row[0] . '</h3>';
		echo '<p>Tem a certeza que deseja apagar este utilizador?<br />';
		echo '<input type="radio" name="confirma" value="Sim" /> Sim';
		echo '<input type="radio" name="confirma" value="Nao" checked="checked" /> Não</p>';
		echo '<p><input type="submit" name="submit" value="Eliminar" /></p>';
		echo '<input type="hidden" name="enviado" value="TRUE" />';
		echo '<input type="hidden" name="id" value="' . $id . '" />';
		echo '</form>';
	
	} 
	else 
	{
		echo '<p class="error">Esta página não está disponível.</p>';
	}

}

mysqli_close($dbc);
		
include ('includes/footer.inc.php');
?>
