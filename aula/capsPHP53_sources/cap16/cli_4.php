<?php
set_error_handler("apontador");
function apontador($errno, $errstr, $errfile, $errline)
{
fwrite(STDERR,"$errstr in $errfile on $errline\n");
}

$fp = fopen("out.txt","r");
$str = fread($fp,filesize("out1.txt"));
fclose($fp);
fwrite(STDOUT, "Tarefa concluída com sucesso!");
?>