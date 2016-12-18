<?php
	Header("Content-type: image/png");
	$im = imagecreate(200, 50);
	$cor = imagecolorallocate($im, 210, 210, 210);
	imagefill($im, 0,0, $cor);
	$cor = imagecolorallocate($im, 0, 0, 0);
	imagestring($im ,5 ,10 ,0, "Exemplo", $cor);
	$cor = imagecolorallocate($im, 255, 0, 0);
	imagestring($im ,5 ,10 ,15, "sobre como utilizar", $cor);
	$cor = imagecolorallocate($im, 0, 0, 255);
	imagestring($im ,4 ,10 ,30, "TEXTO", $cor);
	imagepng($im);
	imagedestroy($im);
?>
