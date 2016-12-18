<?php
	Header("Content-type: image/png");
	$im = imagecreate(200, 50);
	$cor = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0,0, $cor);

	for($n=0;$n<50;$n=$n+5) {
		$cor = imagecolorallocate($im, $n*5, $n*5, $n*5);
		imagerectangle($im, 0, 0, $n+40, $n, $cor);
	}
	imagepng($im);
	imagedestroy($im);
?>
