<?php /*fich10.php*/ ?>
<?php
$file="teste.txt";
if (!file_exists("ensaio")){
    if (mkdir ("ensaio",0755)){
    echo "directoria $dir criada com sucesso<br>";
    }
}
if (copy ($file, "./ensaio/".$file)){
$dir=dirname("ensaio/$file");
echo "cópia bem sucedida do ficheiro $file para a directoria $dir<br>";
} else {
exit ();
}
if (rename ("./ensaio/".$file, "./ensaio/".novo.$file)){
$fich=basename ("ensaio/$file");
echo "alteração de nome para novo$fich bem sucedida<br>";
} else {
exit ();
}
if (unlink("./ensaio/".novo.$file)){
echo "ficheiro novo$file eliminado <br>";
} else {
exit ();
}
if (rmdir("ensaio")){
echo ("directoria ensaio eliminada com sucesso");
}
?>
