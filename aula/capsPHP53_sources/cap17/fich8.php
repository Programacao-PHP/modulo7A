<?php /*fpassthru.php... fich8.php*/ ?>
<?php
$imagem="php5_logo.gif";
if ($fich=fopen("$imagem", "rb")) {
#enviar headers - para funcionar no Firefox
header("Content-Type: image/gif");
header("Content-Length: ".filesize($imagem));
fpassthru($fich);
exit;
} else {
echo ("Impossível abrir o ficheiro");
}
?>
