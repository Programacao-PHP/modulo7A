<?php
$cont==0;
foreach($_REQUEST as $nome_campo => $valor){
   $comando = "\$" . $nome_campo . "='" . $valor . "';";
   eval($comando);
}
try {
if(isset($nome) && $nome !='') {
// abre a Base de Dados SQLite
$dbo = new PDO("sqlite:contactos.sql3"); 
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//selecciona dados na BD SQLite
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome LIKE '".$_REQUEST['nome']."%'");
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome LIKE '".$nome."'");
$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome = :_nome AND password= :_password");
$stmt->bindParam(":_nome", $nome, PDO::PARAM_STR, 15);
$stmt->bindParam(":_password", $password);
$stmt->execute();

echo "Listagem de Registos"."<br>";
	echo "<table border=1>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['id'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['email'].'</td>'.'<td>'.$row['password'].'</td>';
	echo '</tr>';
	$cont=$cont+1;
	}
//executar processo
echo $cont;
}

if ($cont==0) {
?>
<html>
<body>
<font size=+2> Qual o registo pretendido</font><br>
<form method="post" action="php_sqlinjection_sel1.php">
  Nome<br/><input type="text" name="nome" /><br/>
  Password<br/><input type="password" name="password" /><br/>
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
