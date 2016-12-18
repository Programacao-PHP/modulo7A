<?php
include("BDMySQL.class.php");

if($cstatus==0 || isset($cstatus)==false) {
?> 
<b>CONTACTAR A AUTORENTAL</b> 
<form name="form1" method="post" action="index.php?pagina=contactos&cstatus=1">
  Email: 
<?php
if($login_status==1) {
	echo "<b>$login_utilizador</b>";
    echo "<input type=\"hidden\" name=\"email\" value=\"$login_utilizador\">";
} else {
    echo "<input type=\"text\" name=\"email\" size=\"50\">";
}
?>
  <br>
  Mensagem:<br>
  <textarea name="mensagem" cols="60" rows="5"></textarea>
  <br>
  <br>
  <input type="submit" name="Submit" value="Enviar Mensagem">
</form>
<p>&nbsp;</p>
<?php
} else {
?>
<b>CONTACTAR A AUTORENTAL</b> 
<br><br>
<?php
	if($email!="") {
		$resultado = mail("suporte@autorental.com", "Mensagem de Utilizador: $email", $mensagem);
		if($resultado==true) {
			echo "Mensagem enviada com sucesso...";
		} else {
			echo "Erro ao enviar a mensagem...";
		}
	} else {
		echo "Por favor introduza o seu email...<br>";
	}
}
?>
