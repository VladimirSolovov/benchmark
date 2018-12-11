<?php
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_bar.php');
require_once ('src/jpgraph_legend.inc.php');
	//require_once ('test.php');
$data = file_get_contents('resultate/result.json');
$json = json_decode($data);
	$data1y=array($json[0][0],$json[1][0],$json[2][0],$json[3][0]);
	$data2y=array($json[0][1],$json[1][1],$json[2][1],$json[3][1]);
	$data3y=array($json[0][2],$json[1][2],$json[2][2],$json[3][2]);
	$graph = new Graph(900,600,'auto');
	$graph->SetScale("textlin");
	$theme_class=new UniversalTheme;
	$graph->SetTheme($theme_class);
	$graph->yaxis->SetTickPositions(array(0,0.5,1,1.5,2,2.5), array(0.25,0.75,1.25,1.75,2.25));
	$graph->SetBox(false);
	$graph->ygrid->SetFill(false);
	$graph->xaxis->SetTickLabels(array('5.2','5.4','7.0','7.2'));
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);
	$b1plot = new BarPlot($data1y);
	$b2plot = new BarPlot($data2y);
	$b3plot = new BarPlot($data3y);
	$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
	$graph->Add($gbplot);
	$b1plot->SetColor("white");
	$b1plot->SetFillColor("#cc1111");
	$b2plot->SetColor("white");
	$b2plot->SetFillColor("#11cccc");
	$b3plot->SetColor("white");
	$b3plot->SetFillColor("#1111cc");
	$graph->title->Set("Benchmark");
	$graph->legend->SetPos(0.05,0.1,'left','high');
	$b1plot->SetLegend('Функция array_intersect');
	$b2plot->SetLegend('Функция array_fill');
	$b3plot->SetLegend('Функция array_sum');
	$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
	$fileName = "graph.jpg";
	$graph->img->Stream($fileName);
	$graph->img->Headers();
	$graph->img->Stream();
?>