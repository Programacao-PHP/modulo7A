<html>
<body>

<table border=1>
<tr>
<td>Num</td><td>Nome</td><td>Morada</td><td>Telefone</td>
</tr>

<?
// abre ou cria a Base de Dados SQLite
$bd = new SQLiteDatabase("BaseDeDados.sqlite2");

// listar todos os registos da tabela da BD
$sql = "SELECT * FROM cliente";
$result = $bd->query($sql);

if($result == false) {
	echo 'Problemas a executar a query!!<br>';
} else {
	
	while ($result->valid()) {
		echo '<tr>';
	    $row = $result->current();      
	    echo '<td>'.$row['num'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['morada'].'</td>'.'<td>'.$row['telefone'].'</td>';
	    $result->next(); 
	    echo '</tr>';
	}
}

?>
</table>

</body>
</html>
