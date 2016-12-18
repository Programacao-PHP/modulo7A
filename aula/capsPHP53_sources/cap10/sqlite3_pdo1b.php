<?php 
if(isset($_REQUEST['num']) && $_REQUEST['num']!='')
{
try {
// cria a BD
$dbo = new PDO("sqlite:bd_sqlite3_pdo.db"); 
//$dbo->exec("CREATE TABLE cliente (num INTEGER PRIMARY KEY, nome CHAR(255), morada char(100), telefone integer(9));)");
$stmt =$dbo->prepare("INSERT INTO cliente (num, nome, morada, telefone) VALUES (:num_v, :nome_v, :morada_v, :telefone_v)");
$stmt ->bindParam(':num_v', $_REQUEST['num']);
$stmt ->bindParam(':nome_v', $_REQUEST['nome']);
$stmt ->bindParam(':morada_v', $_REQUEST['morada']);
$stmt ->bindParam(':telefone_v', $_REQUEST['telefone']);
$stmt->execute();
echo "Registo introduzido"."<br>";
}
catch (exception $e) {
  echo $e->getmessage();
}
}
else
{
?>

<html>
<body>
<font size=+2>Introdução de novo cliente</font><br>
<form method="POST" action="sqlite3_pdo1b.php">
<table border=1>
<tr>
<td>Num:</td><td><input type="text" name="num"></td>
</tr>
<tr>
<td>Nome: </td><td><input type="text" name="nome"></td>
</tr>
<tr>
<td>Morada: </td><td><input type="text" name="morada"></td>
</tr>
<tr>
<td>Telefone: </td><td><input type="text" name="telefone"></td>
</tr>
<tr>
<td></td><td><input type="submit"></td>
</tr>
</table>
</form>

<?	
//$stmt =$dbo->prepare("select * from cliente");	
//$stmt->execute();	
//	print_r($stmt->fetch());
unset($dbo); 
}
?>