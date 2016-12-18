<?php /*Script alter1.php*/ ?>
<html>
<title>PHP - Mysql </title> </head>
<body><p><b>Edição de registo </b>
<br>Registo seleccionado
<form method="POST" action="alter2.php">
Nº de id - <?php echo " $identif";?> <br>
<table border=0 width=60%>
<tr><td width=30%>Nome - </td><td><input type="text" name="nome" value="<?php echo "$nome ";?>" </td></tr>
<tr><td width=30%>Telefone - </td><td><input type="text" name="telefone" value="<?php echo " $telefon"; ?>"></td></tr>
</table><br>
<input type="submit" value="Alterar">
<input type="hidden" name="id" value="<?php echo "$identif";?>">
</form>
<?php
include ('menu.inc');
?>
</body>
</html>
