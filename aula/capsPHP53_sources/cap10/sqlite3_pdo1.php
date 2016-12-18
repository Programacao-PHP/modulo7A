<?php 
try {
// cria a BD
$dbo = new PDO("sqlite:bd_sqlite3_pdo"); 
$dbo->exec("CREATE TABLE utilizador (id INTEGER PRIMARY KEY, nome TEXT)");
$stmt =$dbo->prepare("INSERT INTO utilizador (nome) VALUES (:nome)");
$stmt ->bindParam(':nome', $nome_v);
$nome_v="Zulmiro";
$stmt->execute();
$nome_v="Anastácio";
$stmt->execute();

echo "base de dados criada";

$stmt =$dbo->prepare("select * from utilizador");	
$stmt->execute();	
	print_r($stmt->fetch());


unset($db); 
}

catch (exception $e) {
  echo $e->getmessage();
}
?>
