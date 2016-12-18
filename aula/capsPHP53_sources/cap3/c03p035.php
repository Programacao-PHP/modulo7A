<?php
$word = new COM("word.application") or die("Impossível iniciar o Word ");
print "Word activo, versão {$word->Version}\n</br>";
$word->Visible=1;
$word->Documents->Add();
$word->Selection->TypeText("Este é um teste com PHP4..."); $word->Documents[1]->SaveAs("c:/php4/teste_com_php.doc");$word->Quit();
?>

