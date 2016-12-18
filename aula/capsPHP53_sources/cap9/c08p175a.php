<html>
<head>
<title>PHP - Mysql </title> </head>
<body>
<?php
$ligação = mysql_connect("localhost", "root", "");
if (!$ligação){
     print ("problemas na ligação ao servidor Mysql");
    }
$sql = "select nome,telefone from teste";
$resultado = mysql_db_query ("testeDB", $sql);
if ($resultado){
    print ("<table width=\"95%\" align=center border=2>");
    print ("<tr><td width=\"50%\" bgcolor=\"FFFF00\">NOME</td><td width=\"50%\" bgcolor=\"FFFF00\">TELEFONE</td></tr>");
    while ($registo = mysql_fetch_array($resultado)){
        $nome = $registo["nome"];
        $telf = $registo["telefone"];
        print ("<tr><td>$nome</td><td>$telf</td></tr>");
        }
    echo ("</table>");
    }else{
    print ("não há registos");
    }
mysql_free_result ($resultado);
include ('menu.inc');
?>
</body>
</html>

