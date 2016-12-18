<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$stmt=$pdo->prepare("INSERT INTO teste (nome, telefone) VALUES (:nome, :telefone)");
$stmt1=$pdo->prepare("INSERT INTO descontos (n_int,IRS,data) VALUES (:n_int, :IRS, :data)");

$stmt->bindParam( ":nome",$nome );
$stmt->bindParam( ":telefone",$telefone );
$stmt1->bindParam( ":n_int",$n_int );
$stmt1->bindParam( ":IRS",$IRS );
$stmt1->bindParam( ":data",$data );

$pdo->beginTransaction(); 

$nome="Marco";
$telefone="765456";

$n_int="8";
$IRS="350";
$data="01/2006";    
$stmt->execute();
$stmt1->execute();    

$nome="Armindo";
$telefone="123123123";

$n_int="9";
$IRS="270";
$data="02/2006";
$stmt->execute();
$stmt1->execute();
echo "inserção efectuada ---";
$pdo->commit();
}	

catch(Exception $e)
    {
	$pdo->rollback();
    echo "Falha na Inserção". $e->getMessage();
    }
?> 