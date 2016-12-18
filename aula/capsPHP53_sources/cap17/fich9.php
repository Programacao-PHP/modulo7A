<?php /*fpassthru1.php*/ ?>
<?php
$palavra = "manuel";
if (file_exists("ficheiro.txt")) {
$file=fopen("ficheiro.txt", "r");
print "<b><br>Parte inicial do ficheiro antes de encontrar a palavra \"manuel\"</br></b>";
      while (!feof($file)) {
      $linha =fgets($file,4096);
      $array= explode("|", $linha);
      $nome= $array[0];
               if ($nome==$palavra){
print "<p><b> e o resto do ficheiro depois da palavra \"manuel\" </b><br>";
               fpassthru($file);
               exit();
               }
     print ("$linha<br>");
     }
fclose($file);
}
?>
