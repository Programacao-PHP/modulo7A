<?php
session_start();
if (isset($_SESSION['utilizador']))
{
//session_regenerate_id();
echo $_SESSION['utilizador']."<br>";
echo $_SESSION['password'];
}
?>
