<?php
	Header("Content-type: image/png");
	$im = imagecreate(200, 200);
	$cor = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0,0, $cor);
	for($n=0;$n<190;$n++) {
		$cor = imagecolorallocate($im, 0, 0, $n);
		imagearc($im, 100, 100, $n, $n, 0, 360, $cor);
	}
	imagerectangle($im, 0, 0, 199, 199, $cor);
	imagepng($im);
	imagedestroy($im);
?>
