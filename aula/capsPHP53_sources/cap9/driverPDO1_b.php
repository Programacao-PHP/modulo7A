<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");

foreach ($pdo->query("SELECT * from teste", PDO::FETCH_NUM) as $row) {
    print_r($row);
    }	
}

catch(Exception $e)
    {
    echo $e->getMessage();
    }
?> 