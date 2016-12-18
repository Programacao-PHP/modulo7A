<?
// abre ou cria a Base de Dados SQLite
$bdo = new PDO("sqlite:bd_sqlite3_pdo.db"); 

$stmt =$bdo->prepare("DELETE FROM cliente WHERE num= ".$_REQUEST['num']);
$stmt->execute();

?>
