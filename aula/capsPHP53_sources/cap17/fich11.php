<?php
chdir("c:/temp");
$dir=opendir("..");
while ($file=readdir($dir)){
print ("$file <br>");
}
?>
