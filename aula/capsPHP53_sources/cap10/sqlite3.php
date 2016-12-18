<?php
#->Ligar ao SQLite
try {
$pdo = new PDO('sqlite2:'.'d:\sqlite\canil.sq2');
#-> vamos utilizar SQL fazendo uma declaração para preparar uma selecção de utilizadores:
$stmt = $pdo->prepare("select * from cachorros");
#->execução do comando SQL anterior
$stmt->execute();

#:: após este comando  então essa variavel $smmt já contém vários registos 
#:: agora vamos criar um ciclo para extrair os registos
echo "Exemplificação de ligação a BD (SQLite) com PDO";
echo "<table border=\"1\" width=\"80%\">";
while ($linha = $stmt->fetch())       // faz lembrar o sqlite_fetch_array();no PDO está sendo representado como fetch
	{
    echo "<tr>";
    echo "<td>";
//	echo 	$num = $linha['num'];
    echo $linha[0];
    echo "</td><td>";
//	echo	 $nome = $linha['nome'];
    echo $linha[1];
    echo "</td><td>";
//	echo	$raça = $linha['raça'];
    echo $linha[2];
    echo "</td></tr><br>";
	}
	echo "</table>";
}

catch(Exception $e)
    {
    echo $e->getMessage();
    }

?>
