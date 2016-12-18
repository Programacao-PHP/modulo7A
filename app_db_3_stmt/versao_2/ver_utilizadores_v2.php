<?php
/**
	Versão 2: ver_utilizadores.php
    Versão com páginação dos utilizadores
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

// Devolve os registos a partir da posição inicio + reg_por_pagina (nº de registos por página)
$sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d %M, %Y') AS dr, user_id ";
$sql .= "FROM utilizadores ORDER BY user_dataregisto ASC LIMIT $inicio, $reg_por_pagina";		
$r = @mysqli_query ($dbc, $sql);

// Mostra os registos por página
// Cabeçalho da tabela
echo '<table>
    <tr>
        <td><b>Editar</b></td>
        <td><b>Eliminar</b></td>
        <td><b>Apelido</b></td>
        <td><b>Nome</b></td>
        <td><b>Data de Registo</b></td>
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

mysqli_free_result($r);	// leberta a memória do resultado ocupado por $r
mysqli_close($dbc);


/*
	Cria os links para outras páginas se necessário.
	Determina as páginas
*/	
if ($paginas > 1) 
{
	
	// Adiciona espaço e inicia parágrafo
	echo '<br /><p>';
	
	// Determina a página corrente	
	$pagina_corrente = ($inicio/$reg_por_pagina) + 1;
	
	// Se não é a primeira página então define a anterior
	if ($pagina_corrente != 1) 
	{
		echo '<a href="ver_utilizadores.php?s=' . ($inicio - $reg_por_pagina) . '&p=' . $paginas . '&sort=' . $sort . '">Anteriores</a> ';
	}
	
	// Mostra o número de todas as páginas
	for ($i = 1; $i <= $paginas; $i++) 
	{
		if ($i != $pagina_corrente) 
		{
			echo '<a href="ver_utilizadores.php?s=' . (($reg_por_pagina * ($i - 1))) . '&p=' . $paginas . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	}
	
	// Se não é a última página então mostra Próximas
	if ($pagina_corrente != $paginas) 
	{
		echo '<a href="ver_utilizadores.php?s=' . ($inicio + $reg_por_pagina) . '&p=' . $paginas . '&sort=' . $sort . '">Próximas</a>';
	}
	
	echo '</p>';
	
}
	
include ('includes/footer.php');
?>
