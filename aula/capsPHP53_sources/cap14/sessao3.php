<?php
session_start();
header("Cache-control: private");
//session_register("cfundo");
//session_register("ctexto");
?>

<html>
<body>
Esta página simula uma série de variáveis de sessão.<br>
<form action=regista.php method=post>
Escolha uma côr para o fundo.<br>
<select name="cfundof">
<option value="#ffffff">Branco
<option value="#000000">Preto
<option value="#ff0000">Vermelho
<option value="#00ff00">Verde
<option value="#0000ff">Azul

</select>
<br><br>
Escolha uma côr para o texto.<br>
<select name="ctextof">
<option value="#ffffff">Branco
<option value="#000000">Preto
<option value="#ff0000">Vermelho
<option value="#00ff00">Verde
<option value="#0000ff">Azul
</select>
<br><br>
<input type=submit value="Actualizar"><br>
</form>
<br>
<a href="teste1.php">pagina de teste 1</a><br>
<a href="teste2.php">pagina de teste 2</a><br>
<a href="teste3.php">pagina de teste 3</a><br>
</body>
</html>
