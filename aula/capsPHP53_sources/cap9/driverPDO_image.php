<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");

$pdo->begintransaction(); //Essencial
$stmt=$pdo->prepare("select foto from teste where nome=?");
$stmt->execute(array(1));
$stmt->bindColumn( 1, $type, PDO::PARAM_STR,256);
$stmt->bindColumn( 4, $lob, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);

header("content-Type: $type");

fpassthru($lob);
$pdo->commit();
}	

catch(Exception $e)
    {
    $pdo->rollback();
	echo "Falha na Inserção". $e->getMessage();
    }
?> 