<?php /*contador.php________fich3.php*/ ?>
<?php
if(file_exists("contador.txt")){
  $ok=fopen("contador.txt","r");
  $conta_a = fgets($ok, 10);
  $conta_a++;
  fclose($ok);
  print("<p align=center> <b>nº de acessos à página = $conta_a<b>");
  $conta_b = fopen("contador.txt", "w");
  fputs($conta_b, $conta_a);
  fclose($conta_b);
} else {
$file = fopen("contador.txt", "w");
fputs($file, "1");
fclose($file);
}
?>
