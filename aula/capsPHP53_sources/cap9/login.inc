<?php

if ($_REQUEST['Entrar']) {
	$ligação=mysql_connect("localhost","root","") or die ("Impossível ligar à base de dados");
	$db=mysql_select_db("testeDB") or die ("Impossível seleccionar a base de dados.");
	$sql = "SELECT * FROM users WHERE nome='".$_REQUEST['nome']."' and password='".$_REQUEST['login']."'";
	$result = mysql_query($sql);
	$num_reg=mysql_num_rows($result);
  	if ($num_reg == 1) {
    	while ($registo=mysql_fetch_array($result)) {
    		$nivel=$registo["nivel"];
        }
  		session_register('nivel_s');
  		$_SESSION['nivel_s']=$nivel;
  		echo ("<a href=\"login1.php\"> LOGIN </a>");
  	} else {
  		$_SESSION['nivel_s']="";
  		print "Atenção --- o nome e/ou password estão incorrectos <p>";
  		echo ("<a href=\"login1.php\"> LOGIN </a>");
	}
} else {
	echo ("<a href=\"login1.php\"> LOGIN </a>");
}
?>
