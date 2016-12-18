<?php
session_start();
$marca=md5(uniqid(rand(),TRUE));
$_SESSION['marca']=$marca;
$_SESSION['marca_t']= time();
?>

<form action="php_CSRF_b.php" method="POST">
<input type="hidden" name="marca" value="<?php echo $marca; ?>" />
<p>Item:
<select name="Livro">
<option name="Os Maias">Os Maias</option>
<option name="Lusiadas">Os Lusiadas</option>
<option name="Amor de perdição">Amor de perdição</option>
</select><br/>
<BR><BR>
Quantidade:
<br><input type="text" name="Quantidade" /></p></br>
<p><input type="submit" value="Compra" /></p>
</form>