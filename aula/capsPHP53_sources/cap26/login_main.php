<?php
include("BDMySQL.class.php");
include("ARUtilizador.class.php");
?>
<b>RESULTADO DO LOGIN</b> 
<p>&nbsp;</p>
<?php
$utilizador = new ARUtilizador();
if($utilizador->verificarUtilizador($_REQUEST['login'], $_REQUEST['password'])==true) {
	echo "Login efectuado com sucesso...<br>";
	$_SESSION['login_status'] = 1;
	$_SESSION['login_utilizador'] = $_REQUEST['login'];
	echo "<script>document.location='index.php'</script>";
} else {
	echo "Utilizador não registado. <br>";
}
$utilizador->endARUtilizador();
?>
