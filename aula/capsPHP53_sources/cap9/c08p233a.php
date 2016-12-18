<?php


// include the ADODB library
include("d:/xampp/xampp/xampp/adodb/adodb.inc.php");

// criação de uma instância para o Objecto de ligação MySQL
$db = NewADOConnection("mysql");

// abrir a ligação à base de dados
$db->Connect("localhost", "root", "", "testedb") or die("impossível ligar à base de dados!");

// execute query
$query = "SELECT * FROM teste";
$result = $db->Execute($query) or die("Erro ao interrogar a BD: $query. " . $db->ErrorMsg());

// Início de processo iteratívo
// impressão dos registos no formato NOME - TELEFONE
$numlinhas =$result->RecordCount();
$numcampos=$result->Fieldcount();
echo "Número de registos:" .$numlinhas. "<p>";
echo "Número de campos por registo:" .$numcampos. "<p>";
$result->MoveFirst();        /*      opcional mas recomendado     */
echo "<table border=\"1\" width=\"100%\">";
while (!$result->EOF)
{
	//pode ser tb esta linha
    //echo $result->fields[1] . " - " . $result->fields[2] . "<p>";
	echo "<tr>";
    echo "<td>";
    echo $result->fields['nome'] . "</td><td> " . $result->fields['telefone']. "</td></tr><p>";
  	$result->MoveNext();
}
echo "</table>";
// Imprimir número de registos do resultado
echo "[total de registos]\n - [". $result->RecordCount()."\n]";

// fecho da ligação à BD
$db->Close();

?>
