<?php
include("xmlBI.php");
$bi = new xmlBI();
$bi->xml_file = "bilhete_de_identidade.xml"; 
	
$bi->parse(); 
	
print ($bi->html); 
	
$bi->destroy(); 
?>
