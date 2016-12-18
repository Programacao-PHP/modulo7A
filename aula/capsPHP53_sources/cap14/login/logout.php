<?php 
// logout.php 

// deve-se iniciar a sessão para depois destrui-la
session_start(); 
session_destroy(); 

echo "Logout efectuado com sucesso do Utilizador - ".$_SESSION['username'];

echo "<br><br> Agora será redireccionado para a página de login. 
<META HTTP-EQUIV=\"refresh\" content=\"2; URL=index.php\"> "; 
?> 