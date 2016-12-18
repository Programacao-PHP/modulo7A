<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$stmt=$pdo->prepare("SELECT * from teste where nome = :nome"); 
$stmt->bindParam( ":nome",$nome );
$nome="José";
$stmt->execute();  
$reg = $stmt->fetchAll(); 
print_r($reg);
echo "<br>--------------------------<br>";

$nome="Carlos";
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