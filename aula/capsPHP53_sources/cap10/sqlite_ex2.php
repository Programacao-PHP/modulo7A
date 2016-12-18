<?
if(isset($_REQUEST['num']) && $_REQUEST['num']!='')
{
	// abre ou cria a Base de Dados SQLite
	$bd = new SQLiteDatabase("BaseDeDados.sqlite2");
	//depois de correr este script pela 1ª vez comente as linhas abaixo
	//$bd->query("BEGIN TRANSACTION;
	//CREATE TABLE cliente(num INTEGER PRIMARY KEY, nome CHAR(255), morada char(100), telefone integer(9));
    //COMMIT;"); 

	// introduzir os dados  da form na BD SQLite
	$sql = "INSERT INTO cliente VALUES(".$_REQUEST['num'].", '".$_REQUEST['nome']."', '".$_REQUEST['morada']."', '".$_REQUEST['telefone']."')";
	if(!$bd->query($sql)) {
		echo 'Erro ao efectuar a query à BD.<br>';
	}
	
	echo '<br>registo introduzido <br>[<a href="sqlite_ex2.php">voltar</a>]<br>';
} 
else 
{
?>

<html>
<body>
<font size=+2>Introdução de novo cliente</font><br>
<form method="POST" action="sqlite_ex2.php">
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
}
?>
