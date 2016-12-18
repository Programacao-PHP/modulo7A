<?php
	Header("Content-type: image/png");
	$im = imagecreate(100, 100);
	$cor = imagecolorallocate($im, 255, 0, 0);
	imagefill($im, 0,0, $cor);
	imagepng($im);
	imagedestroy($im);
?>
