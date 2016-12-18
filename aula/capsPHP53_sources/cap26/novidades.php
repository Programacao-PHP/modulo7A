<table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000033">
  <tr> 
    <td bgcolor="#0066FF"><b><font color="#FFFFFF">Novidades</font></b></td>
  </tr>
  <tr>
    <form name="form1" method="post" action="">
      <td bgcolor="#FFFFFF"> 
<?php
include("ARNovidades.class.php");

$novidades = new ARNovidades();
$novidades->listaNovidades();
$novidades->endARNovidades();
?>	 
      </td>
    </form>
  </tr>
</table>
