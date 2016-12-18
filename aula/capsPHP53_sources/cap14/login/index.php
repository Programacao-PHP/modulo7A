<?php 
// Login/sessão
// index.php 


include("auth.php"); 

include("nav.php"); 

echo "Esta é a homepage.";
echo "<br><br>Utilizador - " . $_SESSION['username']; 

// Fechar a ligação ao mysql
mysql_close(); 
?> 