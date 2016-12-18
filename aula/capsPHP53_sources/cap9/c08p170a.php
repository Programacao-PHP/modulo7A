<html>
<body>
<?php
$ligação = mysql_connect("localhost", "marques", "aeiou") or die ("problemas na ligação ao MySQL");
mysql_select_db("testeDB", $ligação);
$sql = "select nome, telefone from teste";
$resultado = mysql_query($sql, $ligação);
$registo1 = mysql_result($resultado, 0, "nome");
$registo2 = mysql_result($resultado, 0, "telefone");
print ("$registo1 --- $registo2 <br>");
mysql_close();
?>
</body>
</html>

