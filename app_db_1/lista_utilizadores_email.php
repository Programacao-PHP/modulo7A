<?php

/**
	Versão 1: lista_utilizadores_email.php
	
    Date: 18/08/2015
    Author: Adelino Amaral
    Description: Prepara a listagem de utilizadores para envio de email.
*/



// define o título da página HTML
$page_title = 'Visualização dos utilizadores registados';
// inclui o cabeçalho na página
include ('includes/header.inc.php');

echo '<h3>Utilizadores Registados</h3>';

// Ligação à base de dados
require_once ('../ligaDB.php');


// comando SQL que permite selecionar registos da tabela utilizadores
$sql = "SELECT user_apelido, user_nome, user_dataregisto, user_id, user_email ";
$sql .= "FROM utilizadores ORDER BY user_dataregisto ASC";

// Executa a query, isto é, o comando SQL
$resultado = @mysqli_query ($dbc, $sql);

// conta o número de registos devolvidos pela query
$num = mysqli_num_rows($resultado);

// verifica se a tabela utilizadores tem registos
if ($num > 0) 
{ // Existem registos.
	
    // Mostra cabeçalho da tabela
	echo '<table>
	      <tr>
              <td><b>Nome</b></td>
			  <td><b>Apelido</b></td>
              <td><b>Data Registo</b></td>
			  <td><b>Email</b></td>
          </tr>';
	
	// Extrai e mostra todos os registos da query utilizando o nome do campo da tabela
	while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) 
	{
		echo '<tr>
                <td>' . $row['user_nome'] . '</td>
				<td>' . $row['user_apelido'] . '</td>
                <td>' . $row['user_dataregisto'] . '</td>
				<td> <a href="enviar_email.php?email=' . $row['user_email'] . '">' . $row['user_email'] . '</a></td>
			  </tr>';
	}

	echo '</table>'; // fecha a tabela.
	
	
	mysqli_free_result ($resultado); // Liberta a memória associada ao resultado

} else { // A tabela utilizadores não tem registos

	echo '<p class="erro">Não existem utilizadores registados.</p>';
		
}

mysqli_close($dbc); // fecha a ligação à base de dados

// inclui o rodapé na página
include ('includes/footer.inc.php');
?>
