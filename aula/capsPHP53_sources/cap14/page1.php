<?php
// page1.php
session_start();
$_SESSION["real_name"] = "Marques/Carlos";
print "<a href='page2.php'>Ir para a página</a>";
?> 