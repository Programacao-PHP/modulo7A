<?php
    function read() {
        $fich=fopen("php://stdin", "r");
        $input=fgets($fich, 80);
        fclose($fich);
        return $input;
    }
 
    print("Qual é o teu primeiro nome? ");
    $nome = read();
    print("olá, $nome  ... tu és fixe!\n");
?>