<?php
/*$line1 = exec('dir', $output, $error);*/
$line1 = exec('ls -ls', $output, $error);
while (list(,$line) = each($output)){ 
  echo $line, "<BR>\n"; 
} 
if ($error){ 
  echo "Código de erro: $error<BR>\n"; 
  exit; 
} 
?>
