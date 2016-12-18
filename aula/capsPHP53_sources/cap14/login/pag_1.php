<?php
// Login/sessões
// link_1.php 

// ligar à base de dados 
//include("connect.php"); 

//include("auth.php"); 
//include("nav.php"); 
session_start();
if(!isset($_SESSION['username'])) {
  	echo 'Acesso interdito <BR>';
	include('auth.php');
   exit;
}	
else {
include("auth.php"); 
include("nav.php");
echo "Esta é a página 1."; 
echo "<br>Utilizador - " . $_SESSION['username'];
// fechar ligação mysql
mysql_close(); 
}
?> 