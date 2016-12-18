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
$stmt =$dbo->prepare("SELECT * FROM cliente where nome=:nome_v");
$nome="Anastacio";
$stmt-> bindParam(':nome_v',$nome);
$stmt->execute();
echo "Listagem de Registos"."<br>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
	//echo '<td>'.$nome=$row['nome'].'</td>';
	echo '<td>'.$row['num'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['morada'].'</td>'.'<td>'.$row['telefone'].'</td>';
	
	
	echo '</tr>';
	}
	
}	
catch (exception $e) {
  echo $e->getmessage();
}
?>

