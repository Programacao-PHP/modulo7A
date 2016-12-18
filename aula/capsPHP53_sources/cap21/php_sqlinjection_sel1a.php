<?php
$conta=0;
function escape($valor) {
   // Stripslashes
   		if (get_magic_quotes_gpc()) {
       	$valor = stripslashes($valor);
   		}
             $valor = sqlite_escape_string( $valor);
             //$valor=strtr($valor, array(’_’=>’\_’,’%’=>’\%’,’and’=>’\and’,’or’=>’\or’,’--’=>’/’));
   return $valor;
}
try {
if(isset($_REQUEST['nome']) && $_REQUEST['nome'] !='') {
$nome = escape($_REQUEST['nome']);
$password =escape($_REQUEST['password']); 
$nome = addslashes($nome);
//$nome = addslashes($nome);
echo "resultado de sqlite_escape_string()- $nome <br>";
echo "resultado addslashes()- $nome <br>";

// abre a Base de Dados SQLite
$dbo = new PDO("sqlite:contactos.sql3"); 
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//selecciona dados na BD SQLite
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome LIKE '".$_REQUEST['nome']."'");
$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome = '".$_REQUEST['nome']."'");
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome = '".escape($_REQUEST['nome'])."' and password='".escape($_REQUEST['password'])."'");
$stmt->execute();
echo "Listagem de Registos"."<br>";
	echo "<table border=1>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
	echo '<td>'.$row['id'].'</td>'.'<td>'.$row['nome'].'</td>'.'<td>'.$row['email'].'</td>'.'<td>'.$row['password'].'</td>';
	echo '</tr>';
	$conta=$conta+1;
	}
//executar processo
echo $conta;
}

if ($conta==0) {
?>
<html>
<body>
<p>SQLInjection <p>
<font size=+2> Qual o registo pretendido</font><br>
<form method="post" action="php_sqlinjection_sel1a.php">
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
