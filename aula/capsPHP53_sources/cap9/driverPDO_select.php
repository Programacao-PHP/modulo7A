<?php
$conta=0;
try {
if(isset($_REQUEST['nome']) && $_REQUEST['nome'] !='') {
// abre a Base de Dados SQLite
$dbo = new PDO("mysql:host=localhost;dbname=testedb", "root",""); 
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//selecciona dados na BD SQLite

$stmt =$dbo->prepare("SELECT * FROM teste WHERE nome like '".$_REQUEST['nome']."%'");
//$stmt =$dbo->prepare("SELECT * FROM teste WHERE nome = '".$_REQUEST['nome']."'");
$stmt->execute();
echo "Listagem de Registos"."<br>";
	echo "<table border=1>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['id'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['telefone'].'</td>';
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
<font size=+2> Qual o registo pretendido</font><br>
<form method="post" action="driverPDO_select.php">
  Nome<br/><input type="text" name="nome" /><br/>
  Telefone<br/><input type="text" name="telefone" /><br/>
<input type="submit" name="Submit" value="check">
</form>

<?php
	}	
}
catch (Exception $e)
{
  echo "Falha na selecção ---> sem efeito";
    echo $e->getmessage();
  }
?>
