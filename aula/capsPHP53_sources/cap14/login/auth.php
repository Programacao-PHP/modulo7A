<?php 
session_start(); 
// auth.php 
// start session 

include("connectDB.php");  

if($_POST){ 
  $_SESSION['username']=$_POST["username"]; 
  $_SESSION['password']=$_POST["password"];   
} 

// query  
$result=mysql_query("select * from users  where login='" . $_SESSION['username'] . "' and password='" . $_SESSION['password'] . "'"); 

// número de registos 
$num=mysql_num_rows($result);  
// se não há registos aparece o ecrã de login. 
if($num < 1){ 
  echo "Não está autenticado.  Faça login sff.<br><br> 
   
  <form method=POST action=index.php> 
  Utilizador: <input type=text name=\"username\"> 
  password: <input type=password name=\"password\"> 
  <BR> <BR> <BR> <BR>
  <input type=submit value=\" - Login - \"> 
  </form>"; 
   
  exit; 
} 
?> 