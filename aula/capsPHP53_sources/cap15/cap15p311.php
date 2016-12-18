<?php
	Header("Content-type: image/png");
	$im = imagecreate(200, 100);
	$cor = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0,0, $cor);
	$cor = imagecolorallocate($im, 0, 0, 0);
	imagestring($im ,5 ,10 ,0, "Horizontal", $cor);
	$cor = imagecolorallocate($im, 255, 0, 0);
	imagestringup($im ,5 ,10 ,90, "Vertical", $cor);
	imagepng($im);
	imagedestroy($im);
?>
