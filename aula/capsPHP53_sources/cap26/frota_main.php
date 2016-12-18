<b>FROTA DE VEÍCULOS</b> <br><br> 
<?php
include("BDMySQL.class.php");
include("ARFrota.class.php");

$frota = new ARFrota();
$frota->cabecalhoFrota();
$frota->listaFrota($tipo);
$frota->endARFrota();
?>
<p>&nbsp;</p>
