<?php
mysql_connect("localhost","root","") or die ("Impossível ligar à base de dados");
$sql="select * from teste where id=".$_REQUEST['id']."";
$resultado=mysql_db_query ("testeDB",$sql);
if ($resultado) {
	print ("Eliminação do registo com id=".$_REQUEST['id']." vai ser executada");
	print ("<table width=90% align=center border=3>");
	print ("<tr bgcolor=\"aaa000\"></td><td>Nome</td><td>Telefone</td></tr>");
 	while ($registo=mysql_fetch_array($resultado)){
		$nome=$registo["nome"];
		$telef=$registo["telefone"];
		$id=$registo["id"];
		print ("<tr><td align=center>$nome</td><td>$telef</td></tr>");
	}

print ("</table>");

if ($_REQUEST['submit']) {
	$sql = "delete from teste where id=".$_REQUEST['id'];
	$resultado = mysql_db_query ("testeDB",$sql);
	$num_del=mysql_affected_rows();
	if ($num_del>0){
		print ("<p> Eliminação do registo executada com sucesso");
	}
	
}else{
	?>
	<form method="post" action="<?php echo $_SERVER['PATH_INFO']?>">
	<p>Confirma a eliminação ?
	<input type="submit" name="submit" value=" OK">
	<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
	</form>
	<?php
	}
}else{
printf ("Não há registos ");
}
mysql_close();
include("menu.inc");
?>
</body>
</html>
