<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$decl=$pdo->prepare("SELECT * FROM teste WHERE nome = ?"); 
//$decl->execute();
$decl=execute(array('Carlos'));
$reg = $decl->fetchAll(); 
print_r($reg);   
		while ($reg=$decl->fetch()) 
		{
			print_r($reg);
		}
}	
catch(Exception $e)
    {
    echo $e->getMessage();
    }
?> 