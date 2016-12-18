<?php

/**
	Versão 2: ver_utilizadores.php
	
    Date: 18/08/2015
	Update: 13/11/2016
    Author: Adelino Amaral
    Description: Devolve todos os registos existentes na tabela utilizadores. 
				 Altera a forma de efetuar a consulta.
*/

$page_title = 'Visualização dos utilizadores registados';
include ('includes/header.inc.php');

echo '<h3>Utilizadores Registados</h3>';

// Ligação à base de dados
require_once ('../ligaDB.php');


$sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d/%m/%Y') AS dr, user_id ";
$sql .= "FROM utilizadores ORDER BY user_dataregisto ASC";

// Executa a query
$r = @mysqli_query ($dbc, $sql);

// conta o número de registos devolvidos pela query
$num = mysqli_num_rows($r);

if ($num > 0) 
{ // Existem registos.

    echo "<p>Atualmente existem $num utilizadores registados.</p><br /> ";
	
    // Mostra cabeçalho da tabela
	echo '<table>
	      <tr>
		  	  <td><b>Editar</b></td>
			  <td><b>Eliminar</b></td>
              <td><b>Nome</b></td>
			  <td><b>Apelido</b></td>
              <td><b>Data Registo</b></td>
          </tr>';
	
	// Extrai e mostra todos os registos da query
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
	{
		echo '<tr>
				<td> <a href="edita_utilizador.php?id=' . $row['user_id'] . '">Editar</a></td>
				<td> <a href="apaga_utilizador.php?id=' . $row['user_id'] . '">Elimina</a></td>
                <td>' . $row['user_nome'] . '</td>
				<td>' . $row['user_apelido'] . '</td>
                <td>' . $row['dr'] . '</td>
			  </tr>';
	}

	echo '</table>'; // fecha a tabela.
	
	
	mysqli_free_result ($r); // Liberta a memória associada ao resultado

} else { // Não foram devolvidos registos

	echo '<p class="erro">Não existem utilizadores registados.</p>';
		
}

mysqli_close($dbc); // fecha a ligação à base de dados

include ('includes/footer.inc.php');
?>
