<?php  
// connect.php 


$hostname="localhost"; 
$mysql_login="root"; 
$mysql_password=""; 
$database="testedb"; 

if (!($db = mysql_connect($hostname, $mysql_login , $mysql_password))){ 
  die("impossível ligar ao MySQL.");     
}else{ 
  if (!(mysql_select_db("$database",$db)))  { 
    die("Impossível ligar a db."); 
  } 
} 
?> 
