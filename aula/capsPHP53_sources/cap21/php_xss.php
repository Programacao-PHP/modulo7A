<?php
$conta=0;
try {
if(isset($_REQUEST['nome']) && $_REQUEST['nome'] !='') {
// abre a Base de Dados SQLite
$dbo = new PDO("sqlite:contactos.sql3"); 
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt =$dbo->prepare("INSERT INTO identific (nome, password, email) values ('".$_REQUEST['nome']."','".$_REQUEST['password']."','".$_REQUEST['email']."')");
$stmt->execute();
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome = '".$_REQUEST['nome']."' and password='".$_REQUEST['password']."'");
$stmt =$dbo->prepare("SELECT * FROM identific");
$stmt->execute();
echo "Registos Inseridos"."<br>";
	echo "<table border=1>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['nome'].'</td>'.'<td>'.$row['password'].'</td>'.'<td>'.$row['email'].'</td>';
	echo '</tr>';
	$conta=1;
	}
}

if ($conta==0) {
?>
<html>
<body>
<font size=+2> Insira o registo</font><br>
<form method="POST" action="php_xss.php">
  Nome<br/><input type="text" name="nome" /><br/>
  Password<br/><input type="password" name="password" /><br/>
  email<br/><input type="email" name="email" /><br/>
<input type="submit" name="Submit" value="check">
</form>

<?php
	}	
}
catch (Exception $e)
{
  echo "Falha na INSERÇÃO ---> sem efeito";
    echo $e->getmessage();
  }
?>
