<b>LISTA DE AGÊNCIAS</b> 
<p>
  <?php
include("BDMySQL.class.php");
include("ARLocal.class.php");

$tlocal = new ARLocal();
$tlocal->listaLocal();
$tlocal->endARLocal();

?>
</p>
<p>&nbsp;</p>
