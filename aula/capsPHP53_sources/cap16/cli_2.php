<?php
//cli_2.php
$primeiro=$argv[1];
$segundo=$argv[2];
echo "Este é o apelido $segundo  PHP/CLI depois do nome $primeiro \n";
print ("Mas o argumento inicial (nome do script) é -> $argv[0] \n");
echo "numero de argumentos transmitidos ao script -> $argc \n";
echo "estas são as variáveis de ambiente \n";
print_r ($_ENV);
?>