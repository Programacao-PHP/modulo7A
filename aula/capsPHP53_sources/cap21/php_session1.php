<?php
session_start();
$_SESSION['utilizador']='marques';
$_SESSION['password']='aeiou';
echo "entrou com sessão - ". session_id();
?>
