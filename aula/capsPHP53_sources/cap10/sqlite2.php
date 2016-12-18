<head>
       <title>CANIL</title>
</head>
<body>
<?php
	$dados=new SQLiteDatabase('d:\sqlite\canil.sq2') or die ("Falha na ligação à base de dados\n");
		
		$interrog="SELECT * FROM cachorros";
		$resultado=$dados->query($interrog);
		if ($resultado->numRows() > 0) { 
        	echo "<table cellpadding=10 border=1>"; 
    		while($linha = $resultado->fetch()) { 
        	echo "<tr>"; 
        	echo "<td>".$linha[0]."</td>"; 
        	echo "<td>".$linha[1]."</td>"; 
        	echo "<td>".$linha[2]."</td>"; 
        	echo "</tr>"; 
    		} 
    	echo "</table>"; 
		} 
	unset($dados);	
?>
</body>
</html>
