<?php
mysql_connect("localhost","root","") or die("impossível ligar ao servidor Mysql<p>");
$sql="update teste set nome='".$_REQUEST['nome']."',telefone='".$_REQUEST['telefone']."' where id='".$_REQUEST['id']."'";
$resultado=mysql_db_query("testeDB",$sql);
$num_afect=mysql_affected_rows();
if ($resultado) {
print ("Alteração de $num_afect registo efectuada com sucesso<p>");
print ("O registo alterado passa a possuir os seguintes dados <p>");
$sql="select * from teste where id='".$_REQUEST['id']."'";
$resultado=mysql_db_query ("testeDB",$sql);
$num_campos=mysql_num_fields($resultado);
$num_reg=mysql_num_rows($resultado);
print ("<table width=90% align=center border=3>");
for ($coluna=0;$coluna<$num_campos;$coluna++) {
$field=mysql_field_name ($resultado,$coluna);
$campo=mysql_result($resultado,0,"$field");
print ("<tr><td align=center bgcolor=FFFF00>$field</td><td>$campo</td></tr>");
}
print ("</table>");
}else{
print ("Ocorreu um erro, repita a operação");
}
include ('menu.inc');
//include ('menu1A.inc');
mysql_free_result($resultado);
mysql_close();
?>
</body>
</html>
