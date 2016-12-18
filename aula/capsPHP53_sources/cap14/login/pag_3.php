<?php 
// Login/sessões
// link_3.php 

// ligação à base de dados 
//include("connect.php"); 

include("auth.php"); 

include("nav.php"); 

echo "Esta é a pagina 3.";
echo "<br>Utilizador - " . $_SESSION['username']; 

// fechar ligação mysql
mysql_close(); 
?> 