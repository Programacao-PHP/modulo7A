<?php   
 session_start();   
  
 if ( ($_POST["input"] == $_SESSION["key"]) && (!empty($_POST["input"]) && !empty($_SESSION["key"])) )   {   
     // fazer autenticação ou registo
	 echo "Acaba de passar o teste neste exemplo. <br><br>";   
     echo "A sua mensagem: \"" . $_POST["mensagem"] . "\" está a ser mostrada ";   
       
 } else {   
     echo "Não passou o teste pois indicou.<br><br>";   
     echo " " . $_POST["input"] . " como valor na imagem <br>";   
     echo " e a resposta correcta é " . $_SESSION["key"];   
 }   
?>   
