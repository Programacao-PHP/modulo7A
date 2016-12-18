<?php
include("BDMySQL.class.php");
?>
<b>REGISTO DE UTILIZADORES</b> 
<?php
if($_REQUEST['status']=="registo") {
?>
<form name="form1" method="post" action="index.php?pagina=registo&status=verificar">
  <b>Nome</b>: 
  <input type="text" name="nome" size="40">
  <br>
  <b>Morada</b>: 
  <textarea name="morada" cols="40" rows="3"></textarea>
  <br>
  Cod. Postal 
  <input type="text" name="cod_postal1" size="4" maxlength="4">
  - 
  <input type="text" name="cod_postal2" size="3" maxlength="3">
  <input type="text" name="cod_postal3" size="30">
  <br>
  Correio Electr&oacute;nico 
  <input type="text" name="email">
  <br>
  Password: 
  <input type="password" name="password" size="10">
  Re-Escreva a Password: 
  <input type="password" name="rpassword" size="10">
  <br>
  N&uacute;mero Habitual de Cliente 
  <input type="text" name="nhc" size="15">
  (caso j&aacute; seja cliente) <br>
  <br>
  <input type="submit" name="Submit" value="Efectuar Registo">
</form>
<p>&nbsp;</p>
<?php
}
if($_REQUEST['status']=="verificar") {
?>
<br>
Resultado do Registo <br><br>
<?php
include("ARUtilizador.class.php");
	if($_REQUEST['nome']!="") {
		if($_REQUEST['morada']!="") {
			if($_REQUEST['cod_postal1']!="" && $_REQUEST['cod_postal2']!="" && $_REQUEST['cod_postal3']!="") {
				if($_REQUEST['email'] != "") {
					if($_REQUEST['password'] != "" && $_REQUEST['rpassword']!="") {
						if($_REQUEST['password']==$_REQUEST['rpassword']) {
							$utilizador = new ARUtilizador();
							if($utilizador->introduzirUtilizador($_REQUEST['email'], $_REQUEST['password'], $_REQUEST['nome'], $_REQUEST['morada'], $_REQUEST['cod_postal'], $_REQUEST['localidade'], $_REQUEST['telefone'], $_REQUEST['num_c_habitual'])) {
								echo "Registo efectuado com sucesso !!!<br>";
							} else {
								echo "Problema encontado no Registo !!!<br>";
							}
							$utilizador->endARUtilizador();
						} else {
							echo "ERRO: As duas passwords não são coincidentes...<br>";
						}
					} else {
						echo "ERRO: Deve introduzir as duas password, e devem ser iguais...<br>";
					}
				} else {
					echo "ERRO: Deve introduzir o seu endereço de correio electrónico...<br>";
				}
			} else {
				echo "ERRO: Codigo Postal está mal introduzido...<br>";
			}
		} else {
			echo "ERRO: Deve introduzir a sua morada...<br>";
		}
	} else {
		echo "ERRO: Deve introduzir o seu nome...<br>";
	}
}
?>
