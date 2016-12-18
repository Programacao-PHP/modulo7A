<?php
//rss_sqlite1.php
$ficheiro_rss= fopen('ficheiro.rss','w+') or die("impossivel abrir ficheiro");
$rss = "<?xml version='1.0' encoding='ISO-8859-1'?>\n";
$rss .= "<rss version='2.0'>\n";
$rss .= "<channel>\n";
$rss .= "<generator>feito pelo PHP</generator>\n";
$rss .= "<title>PHP</title>\n";
$rss .= "<link>http://localhost</link>\n";
$rss .= "<description>Notícias do PHP</description>\n";
$rss .= "<language>pt-pt</language>\n";

$rss .= "<image>\n";
$rss .= "<title>PHP</title>\n";
$rss .= "<link>http://localhost</link>\n";
$rss .= "<url>localhost/caps_php6/rss/xml.gif</url>\n";
$rss .= "<width>10</width>\n";
$rss .= "<height>20</height>\n";
$rss .= "</image>\n";

try {
$dbo = new PDO("sqlite:rss.sql3"); 
$stmt =$dbo->prepare("SELECT * FROM rss");
$stmt->execute();
$conteudo='';
	while ($row =$stmt->fetch()) {
	$conteudo .= "<item>\n";
	$conteudo .= "<title>".$row['title']."</title>\n";
	$conteudo .= "<pubDate>".$row['pubDate']."</pubDate>\n";
	$conteudo .= "<link>".$row['link']."</link>\n";
	$conteudo .= "<comments>".$row['comments']."</comments>\n";
	$conteudo .= "<description>".$row['description']."</description>\n";
	$conteudo .= "</item>\n";
	}
$xml = $rss.$conteudo;
$xml .= "</channel>\n</rss>\n";
$ficheiro_rss= fopen('ficheiro.rss','w+');
fwrite($ficheiro_rss,$xml);
fclose($ficheiro_rss);
}
catch (exception $e) {
  echo $e->getmessage();
}
?>