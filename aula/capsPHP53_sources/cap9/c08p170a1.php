<html>
<body>
<?php
$ligação = mysql_connect("localhost", "root", "") or die ("problemas na ligação ao MySQL");
mysql_select_db("testeDB", $ligação);
$sql = "select nome, telefone from teste";
$resultado = mysql_query($sql, $ligação);
while ($registo = mysql_fetch_row($resultado)){
    print ("$registo[0] --- $registo[1] <br>");
    }
mysql_close();
?>
</body>
</html>

