<?php
$hoje=mktime(12,0,0,6,25,1999);
echo "Aqui são ".date("g:i:s a, F d, Y", $hoje);
echo "";
echo "No formato GMT são ".gmdate("g:i:s: a, F d, Y", $hoje);
?>
