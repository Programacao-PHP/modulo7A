<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$stmt=$pdo->prepare("SELECT * from teste"); 
//$stmt->execute();    
		print_r($stmt->fetch());
}	

catch(Exception $e)
    {
    echo $e->getMessage();
    }
?> 