<html>
<body>

<?php
ini_set("SMTP","mail.est.ipcb.pt");
ini_set("sendmail_from","marques@est.ipcb.pt");

if (isset($_POST['email'])){
  $email = $_POST['email'] ; 
  $assunto = $_POST['assunto'] ;
  $mensagem = $_POST['mensagem'] ;
 
 if (mail("marques@ipcb.pt", $assunto, $mensagem, "From: $email" )){;
  echo "Obrigado por enviar o email";
  }
}
else
  {
?>  
<form method='POST' action='php_email_injectiona.php'>
  Para: marques@ipcb.pt <br />
  De: <input name='email' type='text' size="70"/> <br />
  Assunto: <input name='assunto' type='text' /><br />
  Message:<br />
  <textarea name='mensagem' rows='10' cols='40'>
  </textarea><br />
  <input type='submit' name='enviar' value='enviar'/>
</form>

<?php
}
?>
</body>
</html>