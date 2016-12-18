<?php
session_start();
//session_register("login_status");
//session_register("login_utilizador");

?>
<html>
<head>
<title>AutoRent Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="autorental.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td>
<!-- PARTE DE TOPO --> 
<?php
include("topo.php");
?>
<!-- PARTE DE TOPO --> 
    </td>
  </tr>
  <tr> 
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td width="75%" valign=top><br>
<!-- CORPO DA PAGINA ESQUERDA -->
<?php
if($_REQUEST['pagina']=="") {
	include("main.php");
} else {
	include($_REQUEST['pagina']."_main.php");
}
?>
<!-- CORPO DA PAGINA ESQUERDA -->
		  </td>
          <td width="25%" valign=top><br>
<!-- CORPO DA PAGINA DIREITA -->
<?php
if ($_SESSION['login_status']==1) {
	echo "Utilizador: <b>".$_SESSION['login_utilizador']."</b><br>";
	echo "<a href=index.php?pagina=logout>Logout</a>";
} else {
	include("login.php");
}
?>
<br>
<?php
include("destaques.php");
?>
<br>
<?php
include("novidades.php");
?>
<!-- CORPO DA PAGINA DIREITA -->
		  </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
<!-- PARTE DE BAIXO --> 
<?php
include("final.php");
?>
<!-- PARTE DE BAIXO --> 
	</td>
  </tr>
</table>
</body>
</html>
