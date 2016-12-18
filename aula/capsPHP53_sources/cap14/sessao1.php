<?php
	session_start();
	$variavel_sessao="um qualquer valor aleatório";
	$_SESSION['variavel_sessao'] = $variavel_sessao;
?>



<?php
	session_start();
	print "O valor da variável de sessão é: ".$_SESSION['variavel_sessao'];
	print "<br>";
	print  "<br> O valor da id de sessão é " .session_id(). "<br>";
	#print_r($_SESSION);
?>

