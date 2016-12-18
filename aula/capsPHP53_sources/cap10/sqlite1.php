<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>CANIL</title>
</head>
<body>
<?php
	$dados=sqlite_open('d:\sqlite\canil.sq2') or die ("Falha na ligação à base de dados\n");

		//$sqlite_query($datalig, "create table cachorros (nome varchar(16), raça varchar(32));");
		//$sqlite_query($datalig, "insert into cachorros values ("Kaiser", "S.Bernardo")");
		$interrog="SELECT * FROM cachorros";
		$resultado=sqlite_query($dados,$interrog);
		if (sqlite_num_rows($resultado) > 0) { 
        	echo "<table cellpadding=10 border=1>"; 
    		while($linha = sqlite_fetch_array($resultado)) { 
        	echo "<tr>"; 
        	echo "<td>".$linha[0]."</td>"; 
        	echo "<td>".$linha[1]."</td>"; 
        	echo "<td>".$linha[2]."</td>"; 
        	echo "</tr>"; 
    		} 
    	echo "</table>"; 
		} 
sqlite_close($dados);
		
		
?>
</body>
</html>
