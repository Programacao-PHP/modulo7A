<?php /*URL.php*/ ?>
<?
$file=fopen("http://www.ipcb.pt", "r");
while (!feof($file)){;
$pag_principal .=fgets($file,1024);
}
print "$pag_principal";
?>
