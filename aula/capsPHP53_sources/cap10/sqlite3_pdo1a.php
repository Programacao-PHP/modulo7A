<?php 
try {
// cria a BD
$dbo = new PDO("sqlite:bd_sqlite3_pdo.db"); 
$dbo->exec("CREATE TABLE cliente (num INTEGER PRIMARY KEY, nome CHAR(255), morada char(100), telefone integer(9));)");
$stmt =$dbo->prepare("INSERT INTO cliente ( nome, morada, telefone) VALUES ( :nome_v, :morada_v, :telefone_v)");
$stmt ->bindParam(':nome_v', $nome);
$stmt ->bindParam(':morada_v', $morada);
$stmt ->bindParam(':telefone_v', $telefone);
$nome="Zulmiro";
$morada="Av da India";
$telefone="555666777";
$stmt->execute();
$nome="Anastacio";
$morada="Av das Rosas";
$telefone="888777666";
$stmt->execute();

echo "base de dados criada"."<br>";
$stmt =$dbo->prepare("select * from cliente");	
$stmt->execute();	
	print_r($stmt->fetch());
unset($db); 
}

catch (exception $e) {
  echo $e->getmessage();
}
?>
