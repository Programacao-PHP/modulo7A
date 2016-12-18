<?php
$texto = "teste1'teste2'teste3'' \"\"teste\'\"teste5";
/*** higiene magic_quotes ('\) ***/
echo filter_var($texto, FILTER_SANITIZE_MAGIC_QUOTES)
?>