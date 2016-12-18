<?php
	$dbdriver="mysql";
	$database="testeDB";
    include('d:/xampp/xampp/xampp/adodb/adodb-exceptions.inc.php');
    include('d:/xampp/xampp/xampp/adodb/adodb.inc.php');
	$db = ADONewConnection($dbdriver); # eg 'mysql' or 'postgres'
	$db->debug = true;
	$db->Connect("localhost","root","",$database);
	$rs = $db->Execute('select * from teste');
	print "<pre>";
	print_r($rs->GetRows());
	print "</pre>";
?>

