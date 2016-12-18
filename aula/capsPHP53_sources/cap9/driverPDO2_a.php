<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$stmt=$pdo->prepare("SELECT * from teste"); 
$stmt->execute();    
		while ($reg=$stmt->fetch()) 
		{
			print_r($reg);
		}
}	

catch(Exception $e)
    {
    echo $e->getMessage();
    }
?> 