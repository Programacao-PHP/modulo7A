<?php /*URL.php*/ ?>
<?php
$file=fopen("http://www2.ipcb.pt", "r");
while (!feof($file)){;
$pag_principal .=fgets($file,1024);
}
print "$pag_principal";
?>
