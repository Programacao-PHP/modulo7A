<?php
echo "Qual o teu nome? ";
$nome=fread(STDIN,80);
echo "Olá $nome";

fwrite(STDOUT, "Qual o Apelido?");
$apelido = trim(fgets(STDIN));
fwrite(STDOUT, "Bem vindo $apelido"); 
?>
