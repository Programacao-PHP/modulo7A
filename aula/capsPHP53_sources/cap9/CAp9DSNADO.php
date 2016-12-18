<?php
include('d:/xampp/xampp/xampp/adodb/adodb.inc.php');	  
$conn = &ADONewConnection('access');	# cria a ligação
$conn->PConnect('testedb');   # liga ao MSACCESS
$recordSet = &$conn->Execute('select * from teste');
if (!$recordSet)
 	print $conn->ErrorMsg();
else
while (!$recordSet->EOF) {
	print $recordSet->fields[0].' '.$recordSet->fields[1].'<BR>';
  	$recordSet->MoveNext();
}
$recordSet->Close(); # opcional
$conn->Close(); # opcional

?>
