<body bgcolor="#FFFFFF" text="#000000">
<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000033">
  <tr> 
    <td bgcolor="#0066FF"><b><font color="#FFFFFF">Destaques</font></b></td>
  </tr>
  <tr>
      <td bgcolor="#FFFFFF"> 
<?php
include("ARDestaques.class.php");

$destaques = new ARDestaques();
$destaques->listaDestaques();
$destaques->endARDestaques();
?>	 
      </td>
  </tr>
</table>
