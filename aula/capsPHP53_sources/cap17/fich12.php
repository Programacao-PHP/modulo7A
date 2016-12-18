<?php /*directoris - fich12*/ ?>
<HTML>
<BODY>
<?php
$full_path=getenv("REQUEST_URI");
echo "path completo - > $full_path <br>";
$nome_dir=dirname($PATH_INFO);
$path = './';
$dir = opendir($path) or die("Impossível abrir a directoria $path");
echo "<b>Ficheiros da directoria $nome_dir</b><br>";
while ($file = readdir($dir)) {
      // if (is_dir($file)){   //modo alternativo  *//
       if (filetype($file)=="dir") {
           if ($file!=".") {
echo "<font color=\"009000\">directoria(s) -» <ahref=\"$file\"> $file  </a>«-($nome_dir)</font><br>";
           }
       }
       if (is_file($file)) {
       //if (!is_dir($file)) {   //modo alternativo  *//
//if (($file!=".") && ($file!="..")) {    //outro modo alternativo *//
             if (is_executable($file)) {
print ("<font color=\"FF0000\">Atenção ficheiro executável - >></font>");
             }
       echo "$file<BR>";
       }
}
rewinddir($dir);
//closedir($dir);//modo alternativo em conjunto com a linha abaixo
//$dir = opendir($path) or die("Impossível abrir a directoria $path");
echo "<b>Nomes de ficheiros da directoria $nome_dir que começam com a palavra \“php\” </b><br>";
while($file = readdir($dir)) {
    if (substr($file, 0, 3) == 'php') {
    echo "$file, <BR>";
    }
}
closedir($dir);
?>
</BODY>
</HTML>
