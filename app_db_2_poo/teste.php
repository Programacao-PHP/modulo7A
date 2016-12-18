<?php
function url_absoluto ($page = 'index.php') 
{

	// Inicia a definição da URL URL...
	// URL inicia com http:// mais o nome do host e o diretório corrente
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	// Retira espaço em branco (ou outros caracteres) no final da string $url
	$url = rtrim($url, '/\\');
	
	// Adiciona o nome da página:
	$url .= '/' . $page;
	
	return $url;

}

echo url_absoluto();
echo "<br /><br /><br /><br /><br />";
$str = "t\\\este//";
echo rtrim($str, '/\\');
?>