<?php
#file.php
$file = fopen("http://www.sapo.pt","r");
fpassthru($file);
?>
