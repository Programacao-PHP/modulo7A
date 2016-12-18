<html>
<title>PHP - Mysql </title> </head>
<body><p><b>Edição de registo </b>
<br>Registo seleccionado
<?php 
$identif = $_REQUEST['identif'];
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$telefon = $_REQUEST['telefon'];

?>
<form ENCTYPE="multipart/form-data" method="post" action="alter2A.php">
Nº de id - <?php echo "$identif"; ?>
<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="100000">
<br>
<table border=4 width=60%>
<tr><td width=30%>Nome - </td><td><input type="text" name="nome" value="<?php echo "$nome";?>" </td></tr>
<tr><td width=30%>Telefone - </td><td><input type="text" name="telefone" value="<?php echo "$telefon"; ?>"></td></tr>
<tr><td width=30%>email - </td><td><input type="text" name="email" value="<?php echo "$email"; ?>"></td></tr>
</table>
<?php
if ($img) {
$src="\"File:\\\\$img\"";
print ("Ficheiro correspondente à imagem ?<input type=\"File\" name=\"imagem\" size=\"50\" value=$src>");
print ("<img border=0 width=58 height=70 src=$src><p>");
} else {
print ("Ficheiro correspondente à imagem ?<input type=\"File\" name=\"imagem\" size=\"50\" value=$src><p>");
}
?>
<input type="submit" name="upload" value=" -   Alterar   -">
<input type="hidden" name="id" value="<?php echo "$identif";?>">
</form>
<?php
//include ('menu1A.inc');
include ('menu1.inc');
?>
</body>
</html>
