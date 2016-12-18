<html>
<body>
<table border=1>
<tr>
<td>Num</td><td>Nome</td><td>Morada</td><td>Telefone</td>
</tr>

<?php 
try {
// cria a BD
$dbo = new PDO("sqlite:bd_sqlite3_pdo.db"); 
/*** modo de erros PDO -> exception ***/
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt =$dbo->prepare("SELECT * FROM cliente");
$stmt->execute();
echo "Listagem de Registos"."<br>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['num'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['morada'].'</td>'.'<td>'.$row['telefone'].'</td>';
	echo '<td><a href="sqlite3_pdo3a.php?num='.$row['num'].'">apagar</a></td><td><a href="sqlite3_pdo3b.php?num='.$row['num'].'">alterar</a></td>';
	echo '</tr>';
	}
	
}	
catch (exception $e) {
  echo $e->getmessage();
}
?>

