<?php /*Script main1A.php*/ ?>
<?php
$IP=getenv("REMOTE_ADDR");
if ($IP!="127.0.0.1") {
print  "Não está autorizado";
exit();
} else {
session_start();
include ('login.inc');
print ("<p align=center> Escolha uma das letras para seleccionar os registos <p>");
include ('header.inc');
print ("<p align=center><img border=\"0\" src=\"./big-logo1t.gif\" width=\"96\" height=\"50\">");
?>
<form method="POST" action="main2.php">
<p align=center><input type="submit" value="Pesquisa avançada" name="pesquisa"></p>
</form>
</body>
</html>
<?php
include ('menu1A.inc');
}
?>

