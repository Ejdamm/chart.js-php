<?php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';
require 'class/ChartJS_Bar.php';
require 'class/ChartJS_Radar.php';
require 'class/ChartJS_PolarArea.php';
require 'class/ChartJS_Pie.php';
require 'class/ChartJS_Doughnut.php';

ChartJS::setDefaultColors(array(array('background' => '#f2b21a', 'border' => '#e5801d', 'pointBackground' => '#e5801d', 'pointBorder' => '#e5801d')));
ChartJS::addDefaultColor(array('background' => 'rgba(28,116,190,.8)', 'border' => '#1c74be', 'pointBackground' => '#1c74be', 'pointBorder' => '#1c74be'));
//ChartJS::addDefaultColor(array('background' => 'rgba(212,41,31,.7)', 'stroke' => '#d4291f', 'point' => '#d4291f', 'pointStroke' => '#d4291f'));
//ChartJS::addDefaultColor(array('background' => '#dc693c', 'stroke' => '#ff0000', 'point' => '#ff0000', 'pointStroke' => '#ff0000'));
//ChartJS::addDefaultColor(array('background' => 'rgba(46,204,113,.8)', 'stroke' => '#2ecc71', 'point' => '#2ecc71', 'pointStroke' => '#2ecc71'));

$array_values = array(array(28, 48, 40, 19, 86, 27, 90), array(65, 59, 80, 81, 56, 55, 40));
$array_labels = array("January", "February", "March", "April", "May", "June", "July");

$Line = new ChartJS_Line('example_line', 500, 500);
$Line->addLine($array_values[0]);
$Line->addLine($array_values[1]);
$Line->addLabels($array_labels);

$Bar = new ChartJS_Bar('example_bar', 500, 500);
$Bar->addBars($array_values[0]);
$Bar->addBars($array_values[1]);
$Bar->addLabels($array_labels);

$Radar = new ChartJS_Radar('example_radar', 500, 500);
$Radar->addRadar($array_values[0]);
$Radar->addRadar($array_values[1]);
$Radar->addLabels($array_labels);

$PolarArea = new ChartJS_PolarArea('example_polararea', 500, 500);
$PolarArea->addSegments($array_values[0]);
$PolarArea->addLabels($array_labels);

$Pie = new ChartJS_Pie('example_pie', 500, 500);
$Pie->addparts($array_values[0]);
$Pie->addLabels($array_labels);

$Doughnut = new ChartJS_Doughnut('example_doughnut', 500, 500);
$Doughnut->addparts($array_values[0]);
$Doughnut->addLabels($array_labels);

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
echo $Bar
?>

<h1>Radar</h1>
<?php
echo $Radar
?>

<h1>Polar Area</h1>
<?php
echo $PolarArea
?>

<h1>Pie & Doughnut</h1>
<?php
echo $Pie . $Doughnut
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
