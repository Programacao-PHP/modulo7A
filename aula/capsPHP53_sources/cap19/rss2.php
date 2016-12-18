
<html>
<!--<html xml:lang="PT" encoding="ISO-8859-1">-->
<head>
<meta http-equiv="Content-Type" content="text/html; "UTF-8" />
<?php
//$rss =  simplexml_load_file('feed.rss');
//$rss =  simplexml_load_file('http://www.tsf.pt/online/rss/ultimas.xml');
$rss =  simplexml_load_file('http://rss.cnn.com/rss/cnn_world.rss');
$titulo =  $rss->channel->title;
echo "<title>".$titulo."</title></head>";
echo "<h1>".$titulo."</h1>";

//$titulo = $rss->xpath('//title');
//echo "<title>".$titulo[0]."</title></head>";
//echo "<h1>".$titulo[0]."</h1>";

foreach ($rss->xpath('//item') as $item) {
echo "<h2><a href='" . $item->link . "'>" . $item->title . "</a></h2>";
echo "<p>" . $item->description . "</p>";
}
?>
</html>