<?php
include("BDMySQL.class.php");
include("ARUtilizador.class.php");
?>
<b>Logout</b> 
<br>A sua sessão foi terminada...
<p>&nbsp;</p>
<?php
session_destroy();
?>
<script>document.location='index.php'</script>