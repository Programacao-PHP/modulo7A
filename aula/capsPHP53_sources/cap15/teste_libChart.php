<?php	
	include "d:/wamp/www/libchart/libchart/libchart.php";
	$chart = new VerticalChart(750, 450);
	$chart->addPoint(new Point("Janeiro 2005", 500));
	$chart->addPoint(new Point("Fevereiro 2005", 321));
	$chart->addPoint(new Point("Março 2005", 442));
	$chart->addPoint(new Point("Abril 2005", 171));
	$chart->addPoint(new Point("Maio 2005", 355));
	$chart->addPoint(new Point("Junho 2005", 555));
	$chart->addPoint(new Point("Julho 2005", 444));
	$chart->addPoint(new Point("Agosto 2005", 1211));
	$chart->addPoint(new Point("Setembro 2005", 500));
	$chart->addPoint(new Point("Outubro 2005", 470));
	$chart->addPoint(new Point("Novembro 2005", 777));
	$chart->addPoint(new Point("Dezembro 2005", 999));
	
	$chart->setTitle("Utilização mensal em 2005");
	$chart->render("teste.png");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libcharts vertical bars demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Vertical bars chart" src="teste.png" style="border: 2px solid gray;"/>
</body>
</html>