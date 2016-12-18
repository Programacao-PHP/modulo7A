<?
// abre ou cria a Base de Dados SQLite
$bd = new SQLiteDatabase("BaseDeDados.sqlite2");

// listar todos os registos da tabela da BD
$sql = "DELETE FROM cliente WHERE num=".$_REQUEST['num'];
$result = $bd->query($sql);

if($result == false) {
	echo 'Problemas a executar a query!!<br>';
} else {
	header("Location: sqlite_ex3a.php");
}

?>
