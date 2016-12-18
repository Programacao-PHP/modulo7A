<?php
	require_once('db_sessions.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DB Session Test</title>
</head>
<body>
	<?php
		// se os dados não estiverem presentes na sessão
		if(empty($_SESSION)){
			$_SESSION['blah'] = 'umlaut';
			$_SESSION['this'] = 3615684.45;
			$_SESSION['that'] = 'blue';

			echo '<p>Os dados da sessão foram guardados.</p>';
		}
		else {
			echo '<p>A sessão já existe:<pre>' . print_r($_SESSION, 1) . '</pre></p>';
		}
	
		// Logout se aplicável
		if (isset($_GET['logout'])) {

			session_destroy();
			echo '<p>Sessão destruída.</p>';

		} else { 
			echo '<a href="index.php?logout=true">LogOut</a>';
		}
	
		echo '<p>Dados da Sessão:<pre>' . print_r($_SESSION, 1) . '</pre></p>';
	?>
</body>
</html>


<?php session_write_close(); ?>