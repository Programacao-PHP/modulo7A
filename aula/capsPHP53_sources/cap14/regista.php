<?php
session_start();
header("Cache-control: private");

$texto=$_POST['ctextof'];
$_SESSION['cfundo'] = $_POST['cfundof'];
$_SESSION['ctexto'] = $_POST['ctextof'];
printf("Variaveis de sessão foram actualizadas.<br><br>Voltar à página <a href=\"sessao3.php\">inicial</a>.");
?>
