<html>
<head>
<title>PHP - Mysql </title> </head>
<?php

$nome = $_REQUEST['nome'];
$telefone = $_REQUEST['telefone'];
$logic = $_REQUEST['logic'];
$sql = $_REQUEST['sql'];
$pag = $_REQUEST['pag'];
$php_self = $_SERVER['PHP_SELF'];

if ($nome) {
$sql1=($nome) ? "nome like '".$nome."%'" :"" ;
}
if ($logic){
$sql1=($nome) ? "nome like '%".$nome."%'" :"" ;
if ($telefone) {
$sql1 .= ($sql1) ? " $logic " : "";
$sql1 .= "telefone like '%".$telefone."%'" ;
}
}
if ($nome or $telefone) {
$ligação=mysql_connect("localhost", "root", "");
         if (!$ligação) {
         print ("Problemas na ligação ao servidor Mysql");
         }
$sql ="select * from teste where ";
$sql .= $sql1. " order by nome asc";
print ("Resultados obtidos da pesquisa <br>");
$resultado = mysql_db_query ("testeDB", $sql);
 if ($resultado) {
    $reg_pag=3;
                  if (!$pag) {
                  $pag=1;
                  }
    $pag_ant=$pag-1;
    $pag_seg=$pag+1;
    $pag_ini=($reg_pag * $pag)-$reg_pag;
    $num_reg=mysql_num_rows($resultado)-1;
    print ("<b> A pesquisa efectuada encontrou $num_reg registo(s) <p>");
    print ("<table width=\"80%\" align=center border=2>");
    print ("<tr><td width=\"50%\" bgcolor=\"FFFF00\">NOME</td><td width=\"30%\" bgcolor=\"FFFF00\">TELEFONE</td></tr>");

         if ($num_reg<=$reg_pag) {
         $num_pag=1;
         } else if (($num_reg % $reg_pag)==0) {
         $num_pag=$num_reg/$reg_pag;
         }else {
         $num_pag=$num_reg /$reg_pag + 1;
         }

$sql=$sql." limit $pag_ini,$reg_pag";
$resultado = mysql_db_query ("testeDB", $sql);
         while ($registo=mysql_fetch_array($resultado)) {
         $nom=$registo["nome"];
         $telf=$registo["telefone"];
         print ("<tr><td>$nom</td><td>$telf</td></tr>");
         }
echo ("</table>");
         print "página - <p>";
         if (($pag_ant) && ($pag>1)) {
         echo "<a href=\"$php_self?pag=$pag_ant&nome=$nome&logic=$logic&telefone=$telefone&sql=$sql\">Anterior </a>|- ";
         }
         for ($i=1; $i<=$num_pag;$i++) {
               if($i !=$pag) {
               echo "<a href=\"$php_self?pag=$i&nome=$nome&logic=$logic&telefone=$telefone&sql=$sql\">$i</a>-| ";
               }else {
               echo"$i -| ";
               }
         }
         if ($pag+1 <$num_pag) {
         echo  "<a href=\"$php_self?pag=$pag_seg&nome=$nome&logic=$logic&telefone=$telefone&sql=$sql\"> Seguinte </a>";
         }

         }else{
print ("não há registos");
}
}else{
echo "Defina condições de selecção <br>";
echo "(a selecção será efectuada para registos cujos campos nome e telefone contenham os caracteres inseridos)<p>";
?>
<form method="post" action="<?php echo $_SERVER['PATH_INFO'];?>">
  <p align=center>Nome - <input type="text" name="nome" size="25">
  <p align=center><b><input type="radio" value="and" name="logic"> e
  <input type="radio" value="or" checked name="logic"> ou </b></p>
  <p align=center>Telefone - <input type="text" name="telefone" size="12"></p>
  <p align=center><input type="submit" value="Procurar" name="Procurar"></p>
</form>
<?php }
//mysql_free_result($resultado);
include ('menu1.inc');
//include ('menu1A.inc');
?>
</body>
</html>
