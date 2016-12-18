<?php
if ($_SESSION['nivel_s']==1) {
         ?>
         <p align=center>
         <table border="0" cellpadding="0" cellspacing="0" width="90%" p>
         <tr>
          <td width="25%"  align="center"><a href="main1A.php"><img border="0" src="_home.gif"></a></td>
          <td width="25%"  align="center"><a href="adic.php"><img border="0" src="_novo.gif"></a></td>
          <td width="25%"  align="center"><a href="alterA.php"><img border="0" src="_alter.gif"></a></td>
          <td width="25%"  align="center"><a href="elim.php"><img border="0" src="_apagar.gif"></a></td>
          </tr>
          <tr>
          <td width="25%"  align="center">- Home </td>
          <td width="25%"  align="center">- Novo registo </td>
          <td width="25%"  align="center">- Alteração de registo</td>
          <td width="25%"  align="center">- Apagar registo</td>
          </tr>
          </table>
          </p>
          <?php
} else if ($_SESSION['nivel_s']==2) {
         ?>
         <p align=center>
         <table border="0" cellpadding="0" cellspacing="0" width="90%" p>
         <tr>
          <td width="25%"  align="center"><a href="main1A.php"><img border="0" src="_home.gif"></a></td>
          <td width="25%"  align="center"><a href="alterA.php"><img border="0" src="_alter.gif"></a></td>
          </tr>
          <tr>
          <td width="25%"  align="center">- Home </td>
          <td width="25%"  align="center">- Alteração de registo</td>
          </tr>
          </table>
          </p>
          <?php

} else {
          ?>
          <p align=center>
          <table border="0" cellpadding="0" cellspacing="0" width="90%">
          <tr>
          <td width="25%"  align="center"><a href="main1A.php"><img border="0" src="_home.gif"></a></td>
          </tr>
          <tr>
          <td width="25%"  align="center">- Home </td>
          </tr>
          </table>
          </p>
          <?php
}
?>
