<?php
Header("Content-type: image/png");
include("graficobarras.inc");

$gbarras = new GraficoBarras(6);
$gbarras->adicionarTituloGrafico("Gráfico Exemplo");
$gbarras->desenhaExterior();
$gbarras->desenhaEscVertical();
$gbarras->desenhaEscHorizontal();
$gbarras->setMaxValor(50);
$gbarras->addDados(50);
$gbarras->addDados(200);
$gbarras->addDados(150);
$gbarras->addDados(300);
$gbarras->addDados(50);
$gbarras->addDados(150);
$gbarras->criaGrafico();
$gbarras->desenhaGrafico();
?>
