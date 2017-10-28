<?php
require 'ChartJS.php';


$data = array(array(28, 48, 40, 19, 86, 27, 90), array(65, 59, 80, 81, 56, 55, 40));
$labels = array("January", "February", "March", "April", "May", "June", "July");
$colors = array(array('backgroundColor' => 'rgba(28,116,190,.8)', 'borderColor' => 'blue'),
          array('backgroundColor' => '#f2b21a', 'borderColor' => '#e5801d'));
//There is a bug in Chart.js that ignores canvas width/height if responsive is not set to false
$options = array('responsive' => false);

$Line = new ChartJS('line', 'example_line', 500, 500, $labels, $options);
$Line->addDataset($data[0], $colors[0], "Legend 1");
$Line->addDataset($data[1], $colors[1], "Legend 2");

$Bar = new ChartJS('bar', 'example_bar', 500, 500, $labels, $options);
$Bar->addDataset($data[0], $colors[1], "Legend 1");
$Bar->addDataset($data[1], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')), "Legend 2");

$Radar = new ChartJS('radar', 'example_radar', 500, 500, $labels, $options);
$Radar->addDataset($data[0], $colors[0], "Legend 1");
$Radar->addDataset($data[1], $colors[1], "Legend 2");

$PolarArea = new ChartJS('polarArea', 'example_polarArea', 500, 500, $labels, $options);
$PolarArea->addDataset($data[0], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')));

$Pie = new ChartJS('pie', 'example_pie', 500, 500, $labels, $options, array('style' => 'display:inline;'));
$Pie->addDataset($data[0], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')));

$Doughnut = new ChartJS('doughnut', 'example_doughnut', 500, 500, $labels, $options, array('style' => 'display:inline;'));
$Doughnut->addDataset($data[0], array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green')));

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
<script src="driver.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>
</body>
</html>
