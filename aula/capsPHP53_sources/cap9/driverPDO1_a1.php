<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$del=$pdo -> exec("INSERT INTO teste (nome) VALUES ('Francisco')");

echo "nº de registos inseridos - $del <br>";
foreach ($pdo->query("SELECT * from teste") as $row ) {
    print_r($row);
    }	
}

catch(Exception $e)
    {
    echo $e->getMessage();
    }
?> 