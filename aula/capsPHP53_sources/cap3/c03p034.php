<html>
<head>
<title>Exemplo de PHP e Java</title>
</head>
</body>
<?php
$system=new Java("java.lang.System");
print "Versão do Java = ".$system->getProperty("java.version")." <br>";
print "Fabricante =".$system->getProperty("java.vendor")."<p>";
print "Sistema Operativo=".$system->getProperty("os.name")." ".$system->getProperty("os.version")." ".$system->getProperty("os.arch")."<br>\n";
$formatador=new Java("java.text.SimpleDateFormat", "EEEE, MMMM dd, yyy 'em' h:mm:ss a zzzz");
print $formatador->format(new Java("java.util.Date"))."\n";
?>
</body>
</html>
