<?php
function processa_formulario() {
	global $nome;
	global $email;
	global $linguagem;
	global $browser;
		printf("O utilizador %s cujo o endereço de email é %s, prefere a linguagem de programação %s e utiliza normalmente o browser %s para navegar na WWW.", $_POST['nome'], $_POST['email'], $_POST['linguagem'], $_POST['browser']);
}
?>

