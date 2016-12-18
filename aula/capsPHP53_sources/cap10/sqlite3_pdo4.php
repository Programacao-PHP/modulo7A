<?php
try{
$dbo = new PDO("sqlite:bd_sqlite3_pdo.db");
$stmt=$dbo->prepare("SELECT * from cliente"); 
$stmt->execute();  
$resultado=$stmt->setFetchMode(PDO::FETCH_ASSOC);  

$iterador=new IteratorIterator($stmt);

	foreach($iterador as $registo) {
		echo '<table border=1 width=190 bordercolor=#AAC000>';
			foreach (new ArrayIterator($registo) as $key=>$valor) {
 				echo '<tr><td width=70>'.$key.'</td><td width=120>'.$valor.'</td></tr>';
  		}
	echo '</table>';
	}
$dbo=null;		
}	

catch(PDOException $e)
    {
    echo "erro". $e->getMessage();
    }
?>
