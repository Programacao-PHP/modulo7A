<?php /*Script odbc_teste.php*/ ?>
<?php
echo "<center>Visualização de base de dados via ODBC<P>";
$ligação=odbc_connect("testeDB-mysql", "root", "") or die ("Impossível ligar via ODBC");
$sql="select * from teste";
//$resultado= odbc_exec ($ligação,$sql) or die ("Impossível executar a query");
$resultado=odbc_do($ligação,$sql);
//$rep=odbc_fetch_row($resultado);
odbc_result_all ($resultado, "border=3");
odbc_free_result($resultado);
odbc_close($ligação);
?>

