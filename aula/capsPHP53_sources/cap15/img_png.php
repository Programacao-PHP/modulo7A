<?php
$im = ImageCreateTrueColor(256,133);
for($x=0; $x<256; $x++) {
ImageLine($im, $x, 0, $x, 33, $x);
ImageLine($im, 255-$x, 34, 255-$x, 66, $x<<8);
ImageLine($im, $x, 67, $x, 99, $x<<16);
}
Header('Content-Type: image/png');
imagePNG($im);
imagePNG($im,"teste.png");
?>
