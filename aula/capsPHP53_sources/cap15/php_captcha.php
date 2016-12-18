<?php
if (isset($_POST['enviar'])){ 
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
} else {
?>
<html>  
 <body>  
 <form action="php_captcha.php" method="post">   
    <table>   
        <tr><td align="center">   
                 Qual a sua Mensagem:   
            </td>  
             <td align="center">   
                <input type="text" maxlength="20" name="mensagem" size="15">   
            </td>  
         </tr>  
         <tr><td align="center">   
             Digite o texto que vê na caixa negra <br>  
             <img src=captcha_criar_img.php >   
             </td>  
             <td align="center">   
                 <input type="text" name="input" size="6">   
             </td>  
         </tr>  
         <tr>  
             <td align="center" colspan="2">   
                 <input type="submit" name="enviar" value="enviar">   
             </td>  
         </tr>  
     </table>  
 </form>  
 </body>  
 </html>  
<?php
}
?>
