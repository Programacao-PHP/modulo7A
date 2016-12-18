<?php
	Header("Content-type: image/png");
	$im = imagecreate(200, 200);
	$cor = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0,0, $cor);
	$cor = imagecolorallocate($im, 0, 0, 0);
	imagearc($im, 100, 100, 150, 150, 0, 360, $cor);
	imagerectangle($im, 0, 0, 199, 199, $cor);
	imagepng($im);
	imagedestroy($im);
?>
