<?php
#->Ligar ao mysql
try {
$pdo = new PDO("mysql:host=localhost; dbname=testedb", "root", "");
#-> vamos utilizar SQL fazendo uma declaração para preparar uma selecção de utilizadores:
$stmt = $pdo->prepare("select * from teste");

#->execução do comando SQL anterior
$stmt->execute();

#:: após este comando  então essa variavel $smtmt já contém vários registos 
#:: agora vamos criar um ciclo para extrair os registos
echo "Exemplificação de ligação a BD (MySQL) com PDO";
echo "<table border=\"1\" width=\"80%\">";
while ($row = $stmt->fetch())       // faz lembrar o mysql_fetch_array();no PDO está sendo representado como fetch
	{
    echo "<tr>";
    echo "<td>";
    $nome = $row['nome'];
    echo $nome;
    //echo "</td><td>";
    //$email = $row['email'];
    //echo $email;
    echo "</td><td>";
    $telefone = $row['telefone'];
    echo $telefone;
    echo "</td></tr><br>";
	}
echo "</table>";
}

catch(Exception $e)
    {
    echo $e->getMessage();
    }

?>
