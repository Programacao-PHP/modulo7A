<?php
	Header("Content-type: image/png");
	$im = imagecreate(200, 50);
	$cor = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0,0, $cor);
	$cor = imagecolorallocate($im, 0, 0, 0);
	imagerectangle($im, 0, 0, 199, 49, $cor);
	imagepng($im);
	imagedestroy($im);
?>
