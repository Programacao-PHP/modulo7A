<?php
header("Content-type: image/png");
$im=imagecreatefrompng("imagem_testex.png");
$cor=imagecolorallocate($im, 255, 204, 51);
imagestring($im ,1 ,100 ,0, $_REQUEST['texto'], $cor);
imagepng($im);
imagedestroy($im);
?>
