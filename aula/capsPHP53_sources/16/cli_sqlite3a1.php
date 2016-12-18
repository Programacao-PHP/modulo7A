#!/opt/lampp/bin/php 
<?php 
//try {
//$qual_campo = $argv[1];
//$qual_conteudo = $argv[2];
echo "Qual o campo que pretende procurar? ";
$qual_campo=trim(fread(STDIN,80));
fwrite(STDOUT, "O que pretende procurar nesse campo? ");
$qual_conteudo = trim(fgets(STDIN));

$dbo = new PDO("sqlite:bd_sqlite3.db"); 
$sql = "SELECT * FROM cliente WHERE $qual_campo like '$qual_conteudo'";
$stmt =$dbo->prepare($sql);
$stmt->execute();
echo "Listagem de Registos";
	while ($row =$stmt->fetch()) {
	echo "\n";
	echo $nome=$row['nome']."---Telf-".$row['telefone'];
	}	
//}	
//catch (exception $e) {
//  echo $e->getmessage();
//}
?>

