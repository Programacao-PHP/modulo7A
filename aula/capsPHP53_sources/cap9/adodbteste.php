<?php
	$dbdriver="mysql";
	$database="testeDB";
    include('c:/xampp/adodb/adodb.inc.php');
	$db = ADONewConnection($dbdriver); # eg 'mysql' or 'postgres'
	//$db->debug = true;
	$db->Connect($server, $user, $password, $database);
	$rs = $db->Execute('select * from teste');
	print "<pre>";
	print_r($rs->GetRows());
	print "</pre>";
?>

