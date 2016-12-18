<?php

$page_title = 'Visualização dos utilizadores registados';
include ('includes/header.php');

echo '<h3>Utilizadores Registados</h3>';

// Ligação à base de dados
require_once ('ligaDB.php');


$sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d/%m/%Y') AS dr, user_id ";
$sql .= "FROM utilizadores ORDER BY user_dataregisto ASC";

$liga = $dbc->query("SELECT user_apelido, user_nome FROM utilizadores");

$registos = $liga->fetchAll(PDO::FECTH_OBJ);	// array de objetos

//$registos = $dbc->query($sql)->fetchAll(PDO::FECTH_OBJ);

	
    // Mostra cabeçalho da tabela
	echo '<table>
	      <tr>
		  	  <td><b>Editar</b></td>
			  <td><b>Eliminar</b></td>
              <td><b>Nome</b></td>
			  <td><b>Apelido</b></td>
              <td><b>Data Registo</b></td>
          </tr>';
	
	foreach($registos as $row):
		echo '<tr>
				<td> <a href="edita_utilizador.php?id=' . $row->user_id . '">Editar</a></td>
				<td> <a href="apaga_utilizador.php?id=' . $row->user_id . '">Elimina</a></td>
                <td>' . $row->user_nome . '</td>
				<td>' . $row->user_apelido . '</td>
                <td>' . $row->dr . '</td>
			  </tr>';		
	endforeach;
	


	echo '</table>'; // fecha a tabela.
	

include ('includes/footer.php');
?>
