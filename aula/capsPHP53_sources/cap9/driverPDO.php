<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
echo "PDO connection object created";
	
}

catch(Exception $e)
    {
    echo $e->getMessage();
    }


?> 