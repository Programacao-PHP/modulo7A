<?php
function validar_email($email) {
	return(ereg('^[-!#$%&\’*+\\./0-9=?A-Z^_`a-z{|}~]+'.
			'@'.
			'[-!#$%&\’*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.
			'[-!#$%&\’*+\\./0-9=?A-Z^_`a-z{|}~]+$',
			$email));
}


if (validar_email("goncaloandre@ipcb.pt"))
	print ("Endereço de e-mail Válido!");
else
	print ("Endereço de e-mail Inválido!");
?>
