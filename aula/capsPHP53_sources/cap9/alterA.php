<html>
<title>PHP - Mysql </title> </head>
<body> <b>Edição de registo </b>
Escolha um registo pelo nome para <b>Alterar</b> ou seleccione o <b>e-mail</b> para enviar <P>
<?php
$ligação= mysql_connect("localhost","root","");
if (!$ligação) {
      print ("problemas na ligação ao servidor Mysql");
}
$sql="select * from teste";
$resultado = mysql_db_query ("testeDB", $sql);
if ($resultado) {
print ("<table width=\"90%\" align=center border=2>");
print ("<tr><td width=\"30%\" align=center bgcolor=\"FFFF00\">NOME</td><td width=\"30%\" bgcolor=\"FFFF00\">TELEFONE</td><td width=\"2%\" bgcolor=\"FFFF00\"></td><td width=\"20%\" bgcolor=\"FFF0000\"> dar click para enviar e-mail</tr>");
while ($registo=mysql_fetch_array($resultado)) {
$id=$registo["id"];
$nome=$registo["nome"];
$telf=$registo["telefone"];
$imagem=$registo["img_nome"];
$email=$registo ["email"];
if ($email) {
$gif="_email.gif" ;
} else {
$gif="_email1.gif" ;
}
print ("<tr> <td align=center><a href=\"alter1A.php?identif=$id&img=$imagem&email=$email&telefon=$telf&nome=$nome\">$nome</a></td> <td>$telf</td> <td width=\"3%\" bgcolor=\"FFFF00\"><img border=\"0\" src=\"$gif\"></td> <td width=\"20%\"align=center><a href=\"email.php?email=$email&nome=$nome\">$email</a></td> </tr>");
}
echo ("</table>");
}else{
print ("não há registos");
}
mysql_free_result ($resultado);
mysql_close();
include ('menu1.inc');
//include ('menu1A.inc');
?>
</body>
</html>
