<?php /*ficheiro1.php fich7.php*/ ?>
<?php
if (file_exists("ficheiro.txt")){
    if ($linha=file("ficheiro.txt")){
         for ($i=0; $i<count($linha);$i++){
         print "$linha[$i] <br>";
         }
    } else {
    print "-impossível ler o ficheiro-";
    }
}
?>
