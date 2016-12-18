<?php

/**
    Date: 18/08/2015
    Author: Adelino Amaral
    Description: Devolve todos os registos existentes na tabela utilizadores.
*/

$page_title = 'Visualização dos utilizadores registados';
include ('includes/header.php');

echo '<h3>Utilizadores Registados</h3>';

// Ligação à base de dados
require_once ('../mysqli_connect.php');


$sql = "SELECT CONCAT(user_apelido, ', ', user_nome) AS NomeCompleto, DATE_FORMAT(user_dataregisto, '%d de %M de %Y') AS dr ";
$sql .= "FROM utilizadores ORDER BY user_dataregisto ASC";

// Executa a query definida na variável $sql
$r = @mysqli_query ($dbc, $sql);

// conta o número de registos devolvidos pela query, referentes ao comando SELECT
$num = mysqli_num_rows($r);

if ($num > 0) 
{ // Existem registos.

    echo "<p>Atualmente existem $num utilizadores registados.</p><br />";
	
    // Mostra cabeçalho da tabela
	echo '<table>
	      <tr>
              <td><b>Nome</b></td>
              <td><b>Data Registo</b></td>
          </tr>';
	
	// Extrai e mostra todos os registos
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
                <td>' . $row['NomeCompleto'] . '</td>
                <td>' . $row['dr'] . '</td></tr>';
	}

	echo '</table>'; // fecha a tabela.
	
	mysqli_free_result ($r); // Liberta a memória associada ao resultado

} else { // Não foram devolvidos registos

	echo '<p class="erro">Não existem utilizadores registados.</p>';
		
}

mysqli_close($dbc); // fecha a ligação à base de dados

include ('includes/footer.php');
?>
