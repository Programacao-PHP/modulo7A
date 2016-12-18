<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$stmt=$pdo->prepare("INSERT INTO teste (nome, telefone) VALUES (:nome, :telefone)");

$stmt->bindParam( ":nome",$nome );
$stmt->bindParam( ":telefone",$telefone );

$nome="Manuel";
$telefone="543543";
$stmt->execute();    

$nome="Sara";
$telefone="78787878";
$stmt->execute();    

$nome="Zacarias";
$telefone="454565";
$stmt->execute();    	
}	

catch(Exception $e)
    {
    echo $e->getMessage();
    }
?> 