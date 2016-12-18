<?php

/**
	Versão 3: ver_utilizadores.php
    Ordena os registos
*/


$page_title = 'Listagem dos Utilizadores Registados';
include ('includes/header.php');

echo '<h1>Utilizadores Registados</h1>';

require_once ('../mysqli_connect.php');

// Define o número de registos por página
$reg_por_pagina = 10;


/**
    Determina o número de páginas
    p - parâmetro que guarda o número de registos por página inseridas
*/
if (isset($_GET['p']) && is_numeric($_GET['p'])) 
{ // O p é válido

	$paginas = $_GET['p'];

} else {
    // Não existe parâmetro p
 	// Conta o número de registos existentes na tabela utilizadores
	$sql = "SELECT COUNT(user_id) FROM utilizadores";
	$r = @mysqli_query ($dbc, $sql);
	
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	
	$registos = $row[0];   // guarda o número de registos

	// Calcula o número de páginas ...
	if ($registos > $reg_por_pagina) 
	{ // Mais que 1 página.
        // determina o número de páginas em função do número de registos
		$paginas = ceil ($registos/$reg_por_pagina);  // ceil arredonda para cima
	} else {
		$paginas = 1;	// quando os registos preenchem uma única página.
	}
	
}



/**
    Determina o início de cada página em termos de número de registos
	s - parâmetro que guarda o início de cada página
*/
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$inicio = $_GET['s'];
} else {
	$inicio = 0;
}


// Determine o tipo de ordenação...
// Por defeito os registos ficam ordenados pela data.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'datareg';

switch ($sort) 
{
	case 'ap':
		$ordena_por = 'user_apelido ASC';
		break;
	case 'no':
		$ordena_por = 'user_nome ASC';
		break;
	case 'datareg':
		$ordena_por = 'user_dataregisto ASC';
		break;
	default:
		$ordena_por = 'user_dataregisto ASC';
		$sort = 'datareg';
		break;
}
	
// Não é bom incluir o $_GET['sort'] na query por razões de segurança
$sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d %M, %Y') AS dr, user_id ";
$sql .= "FROM utilizadores ORDER BY $ordena_por LIMIT $inicio, $reg_por_pagina";		
$r = @mysqli_query ($dbc, $sql);


echo '<table>
<tr>
	<td><b>Editar</b></td>
	<td><b>Eliminar</b></td>
	<td><b><a href="ver_utilizadores.php?sort=ap">Apelido</a></b></td>
	<td><b><a href="ver_utilizadores.php?sort=no">Nome</a></b></td>
	<td><b><a href="ver_utilizadores.php?sort=datareg">Data Registo</a></b></td>
</tr>';


$bg = 'par'; // Inicializa a variável com a class par

// percorre os registos devolvidos pelo SQL
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
{

	$bg = ($bg=="impar" ? "par" : "impar"); // Troca de class.
	
	echo '<tr class="' . $bg . '">';
	echo '<td><a href="edita_utilizador.php?id=' . $row['user_id'] . '">Editar</a></td>';
	echo '<td><a href="apaga_utilizador.php?id=' . $row['user_id'] . '">Eliminar</a></td>';
	echo '<td>' . $row['user_apelido'] . '</td>';
	echo '<td>' . $row['user_nome'] . '</td>';
	echo '<td>' . $row['dr'] . '</td>';
	echo '</tr>';
	
}

echo '</table>';


mysqli_free_result ($r);
mysqli_close($dbc);

/*
	Cria os links para outras páginas se necessário.
	Determina as páginas
*/
if ($paginas > 1) {
	
	echo '<br /><p>';
	$current_page = ($inicio/$reg_por_pagina) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="ver_utilizadores.php?s=' . ($inicio - $reg_por_pagina) . '&p=' . $paginas . '&sort=' . $sort . '">Previous</a> ';
	}
	
	// Make all the numbered paginas:
	for ($i = 1; $i <= $paginas; $i++) {
		if ($i != $current_page) {
			echo '<a href="ver_utilizadores.php?s=' . (($reg_por_pagina * ($i - 1))) . '&p=' . $paginas . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	}
	
	// If it's not the last page, make a Next button:
	if ($current_page != $paginas) {
		echo '<a href="ver_utilizadores.php?s=' . ($inicio + $reg_por_pagina) . '&p=' . $paginas . '&sort=' . $sort . '">Next</a>';
	}
	
	echo '</p>';
	
}
	
include ('includes/footer.php');
?>
