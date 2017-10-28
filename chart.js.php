<?php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';
require 'class/ChartJS_Bar.php';
require 'class/ChartJS_Radar.php';
require 'class/ChartJS_PolarArea.php';
require 'class/ChartJS_Pie.php';
require 'class/ChartJS_Doughnut.php';


$data = array(array(28, 48, 40, 19, 86, 27, 90), array(65, 59, 80, 81, 56, 55, 40));
$labels = array("January", "February", "March", "April", "May", "June", "July");
$colors = array(array('backgroundColor' => 'rgba(28,116,190,.8)', 'borderColor' => 'blue'),
          array('backgroundColor' => '#f2b21a', 'borderColor' => '#e5801d'));
//There is a bug in Chart.js that ignores canvas width/height if responsive is not set to false
$options = array('responsive' => false);

$Line = new ChartJS_Line('example_line', 500, 500, $labels, $options);
$Line->addLine($data[0], $colors[0], "Legend 1");
$Line->addLine($data[1], $colors[1], "Legend 2");

$Bar = new ChartJS_Bar('example_bar', 500, 500, $labels, $options);
$Bar->addBars($data[0], $colors[1], "Legend 1");
$Bar->addBars($data[1], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')), "Legend 2");

$Radar = new ChartJS_Radar('example_radar', 500, 500, $labels, $options);
$Radar->addRadar($data[0], $colors[0], "Legend 1");
$Radar->addRadar($data[1], $colors[1], "Legend 2");

$PolarArea = new ChartJS_PolarArea('example_polarArea', 500, 500, $labels, $options);
$PolarArea->addSegments($data[0], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')));

$Pie = new ChartJS_Pie('example_pie', 500, 500, $labels, $options, array('style' => 'display:inline;'));
$Pie->addParts($data[0], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')));

$Doughnut = new ChartJS_Doughnut('example_doughnut', 500, 500, $labels, $options, array('style' => 'display:inline;'));
$Doughnut->addParts($data[0], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')));

?><!DOCTYPE html>
<html>
<head>
    <title>Chart.js-PHP</title>
</head>
<body>
<h1>Line</h1>
<?php
echo $Line;
?>
<h1>Bar</h1>
<?php
echo $Bar;
?>
<h1>Radar</h1>
<?php
echo $Radar;
?>
<h1>Polar Area</h1>
<?php
echo $PolarArea;
?>
<h1>Pie & Doughnut</h1>
<?php
echo $Pie. $Doughnut;
?>

<script src="Chart.js"></script>
<script src="chart.js-php.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>
</body>
</html>
