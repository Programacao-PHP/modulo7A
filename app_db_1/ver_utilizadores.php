<?php

/**
	Versão 1: ver_utilizadores.php
	
    Date: 18/08/2015
	Update: 13/11/2016
    Author: Adelino Amaral
    Description: Devolve todos os registos existentes na tabela utilizadores.
*/


/*
	Apresentam-se a seguir a inclusão de dois ficheiros, o header.php e ligaDB.php
	Reveja a diferença entre as funções include e require.
	
	Estas duas funções permitem a inclusão dentro do código PHP ficheiros de texto capazes de serem
	interpretados pelo servidor. Esta técnica permite executar um conjunto de instruções que, por serem
	repetitivas, simplificam a gestão da aplicação na perspetiva do programador.
*/

// define o título da página HTML
$page_title = 'Visualização dos utilizadores registados';
// inclui o cabeçalho na página
include ('includes/header.inc.php');

echo '<h3>Utilizadores Registados</h3>';

// Ligação à base de dados
require_once ('../ligaDB.php');


// comando SQL que permite selecionar registos da tabela utilizadores
$sql = "SELECT user_apelido, user_nome, user_dataregisto, user_id ";
$sql .= "FROM utilizadores ORDER BY user_dataregisto ASC";

// Executa a query, isto é, o comando SQL
$resultado = @mysqli_query ($dbc, $sql);

// conta o número de registos devolvidos pela query
$num = mysqli_num_rows($resultado);

// verifica se a tabela utilizadores tem registos
if ($num > 0) 
{ // Existem registos.

	// $num - representa o número de registos
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
	
	// Extrai e mostra todos os registos da query utilizando o nome do campo da tabela
	while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) 
	{
		echo '<tr>
				<td> <a href="edita_utilizador.php?id=' . $row['user_id'] . '">Editar</a></td>
				<td> <a href="apaga_utilizador.php?id=' . $row['user_id'] . '">Elimina</a></td>
                <td>' . $row['user_nome'] . '</td>
				<td>' . $row['user_apelido'] . '</td>
                <td>' . $row['user_dataregisto'] . '</td>
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
