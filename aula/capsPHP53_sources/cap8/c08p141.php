
<?php
function mostrar_formulario()
{
		global $PHP_SELF;
?>
<form action="<?php echo $PHP_SELF; ?>" method=POST>
Nome: <input type=text name="nome"><br>
Email: <input type=text name="email"><br>
<br>
Qual a sua linguagem de programação preferida?<br>
<input type=radio name="linguagem" value="PHP">PHP<br>
<input type=radio name="linguagem" value="C++">C++<br>
<input type=radio name="linguagem" value="C">C<br>
<input type=radio name="linguagem" value="PERL">PERL<br>
<br>
Qual o seu browser de web preferido?<br>
<input type=radio name="browser" value="Firefox">Firefox<br>
<input type=radio name="browser" value="Internet Explorer">Internet Explorer<br>
<br>
<input type=submit value="Submeter Dados">
</form>
<?php
}
?>

<?php
function processa_formulario() {
	global $nome;
	global $email;
	global $linguagem;
	global $browser;
	
	printf("O utilizador %s cujo o endereço de email é %s, prefere a linguagem de programação %s e utiliza normalmente o browser %s para navegar na WWW.", $_POST['nome'], $_POST['email'], $_POST['linguagem'], $_POST['browser']);
}
?>

<?php
if(empty($_POST['nome'])) {
		mostrar_formulario();
} else {
		processa_formulario();
}
?>

