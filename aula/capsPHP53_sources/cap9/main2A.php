<html>
<head>
<title>PHP - Mysql </title> </head>
<?php
if ($nome) {
$sql1=($nome) ? "nome like '".$nome."%'" :"" ;
}
if ($logic) {
$sql1=($nome) ? "nome like '%".$nome."%'" :"" ;
 if ($telefone) {
 $sql1 .= ($sql1) ? " $logic " : "";
 $sql1 .= "telefone like '%".$telefone."%'" ;
 }
}
if ($nome or $telefone) {
$ligação=mysql_connect("localhost", "marques", "aeiou");
         if (!$ligação) {
         print ("Problemas na ligação ao servidor Mysql");
         }

$sql ="select * from teste where ";
$sql .= $sql1. " order by nome asc";
print ("Resultados obtidos da pesquisa <br>");
$resultado = mysql_db_query ("testeDB", $sql);
 if ($resultado) {
 $num_reg=mysql_num_rows($resultado);
 print ("<b> A pesquisa efectuada encontrou $num_reg registo(s) <p>");
 print ("<table width=\"80%\" align=center border=2>");
 print ("<tr><td width=\"50%\" bgcolor=\"FFFF00\">NOME</td><td width=\"30%\" bgcolor=\"FFFF00\">TELEFONE</td></tr>");
         while ($registo=mysql_fetch_array($resultado)) {
         $nom=$registo["nome"];
         $telf=$registo["telefone"];
         print ("<tr><td>$nom</td><td>$telf</td></tr>");
         }
 echo ("</table>");
 }else{
 print ("não há registos");
 }
}else{
echo "defina condições de selecção <br>";
echo "(a selecção será efectuada para registos cujos campos nome e telefone contenham os caracteres inseridos)<p>";
?>
<form method="post" action="<?php echo $PATH_INFO ?>">
  <p align=center>Nome - <input type="text" name="nome" size="25">
  <p align=center><b><input type="radio" value="and" name="logic"> e
  <input type="radio" value="or" checked name="logic"> ou </b></p>
  <p align=center>Telefone - <input type="text" name="telefone" size="12"></p>
  <p align=center><input type="submit" value="Procurar" name="Procurar"></p>
</form>

<?php };
//mysql_free_result ($resultado);
include('menu1.inc');
?>
</body>
</html>
