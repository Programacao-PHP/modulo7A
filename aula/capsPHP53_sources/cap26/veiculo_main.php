<b>DETALHES DO VEÍCULO</b> 
<p>
  <?php
include("BDMySQL.class.php");
include("ARVeiculo.class.php");

$tveiculo = new ARVeiculo();
$tveiculo->detalhesVeiculo($_REQUEST['matricula']);
$tveiculo->endARVeiculo();

if($_SESSION['login_status']==1) {
?>
<form method=post action="index.php?pagina=alugar">
<input type=hidden name="matricula" value="<?php echo $_REQUEST['matricula']; ?>">
<input type=submit value="Alugar">
</form>
<?php
}
?>

</p>
<p>&nbsp;</p>
