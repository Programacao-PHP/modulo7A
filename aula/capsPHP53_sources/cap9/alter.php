<html>
<title>PHP - Mysql </title> </head>
<body> <b>Edição de registo </b><br>
Seleccione o nome de um dos registos para o modificar
<?php
$ligação=mysql_connect("localhost", "root", "");
if (!$ligação) {
      print ("problemas na ligação ao servidor Mysql");
}
$sql="select* from teste";
$resultado = mysql_db_query ("testeDB", $sql);
if ($resultado) {
print ("<table width=\"90%\" align=center border=2>");
print ("<tr><td width=\"40%\" align=center bgcolor=\"FFFF00\">NOME</td><td width=\"40%\" bgcolor=\"FFFF00\">TELEFONE</td></tr>");
while ($registo=mysql_fetch_array($resultado)) {
$id=$registo["id"];
$nome=$registo["nome"];
$telf=$registo["telefone"];
print ("<tr><td align=center><a href=\"alter1.php?identif=$id&telefon=$telf&nome=$nome\">$nome</a></td><td>$telf</td></tr>");
}
echo ("</table>");
}else{
print ("não há registos");
}
mysql_free_result ($resultado);
//include ('menu1A.inc');
include ('menu.inc');
?>
</body>
</html>
