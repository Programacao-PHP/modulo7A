<?php
try {
// abre a Base de Dados SQLite
$dbo = new PDO("sqlite:contactos.sql3"); 
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$stmt =$dbo->prepare("SELECT * FROM identific WHERE nome = '".$_REQUEST['nome']."' and password='".$_REQUEST['password']."'");
$stmt =$dbo->prepare("SELECT * FROM identific");
$stmt->execute();
echo "Registos Inseridos"."<br>";
	echo "<table border=1>";
	while ($row =$stmt->fetch()) {
	echo '<tr>';
//activar/desactivar 
	echo '<td>'.$row['nome'].'</td>'.'<td>'.$row['password'].'</td>'.'<td>'.$row['email'].'</td>';
//	echo '<td>'.htmlentities($row['nome'],ENT_QUOTES,'UTF-8').'</td>'.'<td>'.htmlentities($row['password']).'</td>'.'<td>'.htmlentities($row['email']).'</td>';
//	echo '<td>'.strip_tags($row['nome']).'</td>'.'<td>'.strip_tags($row['password']).'</td>'.'<td>'.strip_tags($row['email']).'</td>';
	echo '</tr>';
	}

}
catch (Exception $e)
{
  echo "Falha na INSERÇÃO ---> sem efeito";
    echo $e->getmessage();
  }
?>
