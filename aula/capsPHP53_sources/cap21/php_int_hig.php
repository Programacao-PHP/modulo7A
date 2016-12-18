<?php
$int = "qwerty8970asdfg+;11";
/*** higienizar um inteiro ***/
echo filter_var($int, FILTER_SANITIZE_NUMBER_INT);
?>