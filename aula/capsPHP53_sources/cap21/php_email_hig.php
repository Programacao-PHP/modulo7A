<?php
/*** endereço de email***/
$email = "marques&companhia@(alien).ex\\ample.com";
/*** higienização do endereço de e-mail ***/
echo filter_var($email, FILTER_SANITIZE_EMAIL);
?>
