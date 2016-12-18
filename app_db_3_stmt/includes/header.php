<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<title><?php echo $page_title; ?></title>	
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
</head>
<body>
	<header>
		<h1>Emídio Navarro</h1>
		<h2>O nosso slogan...</h2>
	</header>
    
	<nav>
		<ul>
			<li><a href="index.php">Home Page</a></li>
			<li><a href="registo.php">Registo</a></li>
			<li><a href="ver_utilizadores.php">Ver Utilizadores</a></li>
			<li><a href="password.php">Senha</a></li>
			<li><?php // Cria o links login/logout.
					// strpos — Find the position of the first occurrence of a substring in a string
					// i.e., a posição da string logout.php na string representada por $_SERVER['PHP_SELF']
					if ( (isset($_SESSION['user_id'])) && (!strpos($_SERVER['PHP_SELF'], 'logout.php')) ) {
						echo '<a href="logout.php">Logout</a>';
					} else {
						echo '<a href="login.php">Login</a>';
					}
				?>
			</li>
		</ul>
	</nav>
    
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Fim header.html -->
