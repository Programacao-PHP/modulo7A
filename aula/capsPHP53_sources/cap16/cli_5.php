#!/opt/lampp/bin/php
<?php
    //cli_5.php
	exec('tar -cvf backup.tar ' . $argv[1]) or die('falha no backup!');
    echo "ficheiro de backup (backup.tar) criado com sucesso!";
?> 