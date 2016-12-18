<?
foreach($_REQUEST as $nome_campo => $valor){
   $comando = "\$" . $nome_campo . "='" . $valor . "';";
   eval($comando);
}

try {
	if(isset ($go) && $go!='') {
	// abre a Base de Dados SQLite
	$dbo = new PDO("sqlite:bd_sqlite3_pdo.db"); 
	/*** modo de erros PDO -> exception ***/
	$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt =$dbo->prepare("UPDATE cliente SET nome='$nome', morada='$morada', telefone='$telefone' WHERE num='$num'");

	$dbo->beginTransaction();
	$stmt->execute();
	$dbo->commit();	
	//echo "Alteração efectuada---";
	header('Location: sqlite3_pdo3.php');
	}
	else
	{
	$dbo = new PDO("sqlite:bd_sqlite3_pdo.db"); 
	$stmt= $dbo->prepare("SELECT * FROM cliente WHERE num='$num'");
	$stmt->execute();      
	$row=$stmt->fetch();
?>
	<html>
	<body>
	<font size=+2>Alteração de um cliente</font><br>
	<form method="POST" action="sqlite3_pdo3b111.php">
	<table border=1>
	<tr>
	<td>Num: </td><td><input type="text" value="<? echo $row['num'];?>" name="num"></td>
	</tr>
	<tr>
	<td>Nome: </td><td><input type="text" value="<? echo $row['nome'];?>" name="nome"></td>
	</tr>
	<tr>
	<td>Morada: </td><td><input type="text" value="<? echo $row['morada'];?>" name="morada"></td>
	</tr>
	<tr>
	<td>Telefone: </td><td><input type="text" value="<? echo $row['telefone'];?>" name="telefone"></td>
	<input type="hidden" name="go" value="1">
	</tr>
	<tr>
	<td></td><td><input type="submit"></td>
	</tr>
	</table>
	</form>
<?
	}
}
catch (Exception $e)
{
  $dbo->rollback();
  echo "Falha na alteração ---> Alteração sem efeito";
  }
?>
