<?php
mysql_connect("localhost","marques","aeiou") or die ("Impossível ligar à base de dados");
$sql = "select * from teste order by id asc";
$resultado = mysql_db_query("testeDB",$sql);
if ($resultado) {
print ("<b>Seleccione o registo que pretende eliminar<p></b>");
print ("<table width=80% align=center border=3>");
print ("<tr bgcolor=\"ffa000\"><td ></td><td>Nome</td><td>Telefone</td></tr>");
while ($registo=mysql_fetch_array($resultado)){
$nome=$registo["nome"];
$telef=$registo["telefone"];
$id=$registo["id"];
print ("<td><align=center><a href=\"elim1.php?nome=$nome&telefone=$telef&id=$id\">$id</a></td><td>$nome</td><td>$telef</td></tr>");
}
print ("</table>");
}else{
printf ("Não há registos ");
}
mysql_free_result ($resultado);
//include ('menu1A.inc');
include("menu.inc");
?>
</body>
</html>
