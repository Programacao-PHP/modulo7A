<?php
include('classmail.inc.php');

$mensagem = new email("Olá amigos","Esta mensagem foi enviada utilizando a classe email.", "Carlos", "carlos.serrao@iscte.pt", array("marques@ipcb.pt","goncaloandre@hotmail.com"),"webmaster@webit.pt");

if ($mensagem->send())
	print "Envio efectuado com Sucesso!";
else
	print "Envio não efectuado!";
?>