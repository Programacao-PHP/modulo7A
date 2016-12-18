<?php
$conta=0;
try {
if(isset($_REQUEST['nome']) && $_REQUEST['nome'] !='') {
// abre a Base de Dados SQLite
$dbo = new PDO("sqlite:contactos.sql3"); 
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//selecciona dados na BD SQLite
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome LIKE '".$_REQUEST['nome']."'");
$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome = '".$_REQUEST['nome']."'");
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome = '".$_REQUEST['nome']."' AND password='".$_REQUEST['password']."'");
$stmt->execute();
echo "Listagem de Registos"."<br>";
	echo "<table border=1>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['id'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['email'].'</td>'.'<td>'.$row['password'].'</td>';
	echo '</tr>';
	$conta=$conta+1;
	}
//executar processo
echo $conta;
}


if ($conta==0) {
?>
<html>
<body>
Exemplo de SQL Injection <p>
<font size=+2> Qual o registo pretendido?</font><br>
<form method="post" action="php_sqlinjection_sel.php">
  Nome<br/><input type="text" name="nome" maxlength="20"/><br/>
  Password<br/><input type="password" name="password" maxlength="10"/><br/>
<input type="submit" name="Submit" value="check">
</form>

<?php
	}	
}
catch (Exception $e)
{
  echo "Falha na selecção ---> sem efeito <br>";
    echo $e->getmessage();
  }
?>
