<?php

session_start();

if (!isset($_SESSION['visitas']))
{
//	    session_regenerate_id(); 
		$_SESSION['visitas'] = 1;
}
else
{
	$_SESSION['visitas']++;
}

echo $_SESSION['visitas'];

?>
