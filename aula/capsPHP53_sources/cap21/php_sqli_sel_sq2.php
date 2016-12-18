<?php
$conta=0;
try {
if(isset($_REQUEST['nome']) && $_REQUEST['nome'] !='') {
// abre a Base de Dados SQLite
$db = new SQLiteDatabase("bd.sqlite2"); 
$result=$db->query("SELECT * FROM utilizador WHERE nome LIKE '".$_REQUEST['nome']."'");
//$result=$db->query("SELECT * FROM utilizador WHERE nome LIKE '".$_REQUEST['nome']."' and password='".$_REQUEST['password']."'");
echo "Listagem de Registos"."<br>";
	echo "<table border=1>";
	while ($result->valid()) {
	$row = $result->current();  
	echo '<tr>';
	echo '<td>'.$row['id'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['email'].'</td>'.'<td>'.$row['password'].'</td>';
	echo '</tr>';
// aplique em nome -> 1' or 1=1 --	
	$result->next(); 
	$conta=$conta+1;
	}
//executar processo
echo $conta;
}


if ($conta==0) {
?>
<html>
<body>
Exemplo de SQL Injection <p>
<font size=+2> Qual o registo pretendido?</font><br>
<form method="post" action="php_sqli_sel_sq2.php">
  Nome<br/><input type="text" name="nome" maxlength="20"/><br/>
  Password<br/><input type="password" name="password" maxlength="10"/><br/>
<input type="submit" name="Submit" value="check">
</form>

<?php
	}	
}
catch (Exception $e)
{
  echo "Falha na selecção ---> sem efeito";
    echo $e->getmessage();
  }
?>
