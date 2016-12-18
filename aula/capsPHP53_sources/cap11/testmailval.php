<?php
include('mailval.php');

if (!mailval("goncaloandre@hotmail.com",3))
	print ("Endereço de e-mail Válido!");
else
	print ("Endereço de e-mail Inválido!");
?>