<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
$stmt=$pdo->prepare("INSERT INTO descontos (n_int,IRS,data) VALUES (:n_int, :IRS, :data)");

$stmt->bindParam( ":n_int",$n_int );
$stmt->bindParam( ":IRS",$IRS );
$stmt->bindParam( ":data",$data );

$n_int="8";
$IRS="350";
$data="01/2006";    
$stmt->execute();    
echo "inserção efectuada ---";
}	

catch(Exception $e)
    {
    echo "Falha na Inserção". $e->getMessage();
    }
?> 