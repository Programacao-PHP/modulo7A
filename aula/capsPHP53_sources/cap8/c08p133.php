<?php
function mostrar_formulario()
{
#global $PHP_SELF;
?>
<form action="<?php echo $_REQUEST[PHP_SELF]; ?>" method='POST'>
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
<input type=hidden name="etapa" value="resultados">
<input type=submit value="Submeter Dados">
</form>
<?php
}
?>
