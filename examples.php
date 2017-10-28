<?php
require 'ChartJS.php';


$data = array(
            array(28, 48, 40, 19, 86, 27, 90),
            array(65, 59, 80, 81, 56, 55, 40)
        );
$labels = array("January", "February", "March", "April", "May", "June", "July");
$colors = array(
              array('backgroundColor' => 'rgba(28,116,190,.8)', 'borderColor' => 'blue'),
              array('backgroundColor' => '#f2b21a', 'borderColor' => '#e5801d'),
              array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green'))
          );

//There is a bug in Chart.js that ignores canvas width/height if responsive is not set to false
$options = array('responsive' => false);

//html attributes fot the canvas element
$attributes = array('id' => 'example', 'width' => 500, 'height' => 500, 'style' => 'display:inline;');


/*
 * Create charts
 *
 */

$attributes['id'] = 'example_line';
$Line = new ChartJS('line', $labels, $options, $attributes);
$Line->addDataset($data[0], $colors[0], "Legend 1");
$Line->addDataset($data[1], $colors[1], "Legend 2");

$attributes['id'] = 'example_bar';
$Bar = new ChartJS('bar', $labels, $options, $attributes);
$Bar->addDataset($data[0], $colors[1], "Legend 1");
$Bar->addDataset($data[1], $colors[2], "Legend 2");

$attributes['id'] = 'example_radar';
$Radar = new ChartJS('radar', $labels, $options, $attributes);
$Radar->addDataset($data[0], $colors[0], "Legend 1");
$Radar->addDataset($data[1], $colors[1], "Legend 2");

$attributes['id'] = 'example_polarArea';
$PolarArea = new ChartJS('polarArea', $labels, $options, $attributes);
$PolarArea->addDataset($data[0],  $colors[2]);

$attributes['id'] = 'example_pie';
$Pie = new ChartJS('pie', $labels, $options, $attributes);
$Pie->addDataset($data[0], $colors[2]);

$attributes['id'] = 'example_doughnut';
$Doughnut = new ChartJS('doughnut', $labels, $options, $attributes);
$Doughnut->addDataset($data[0], $colors[2]);


/*
 * Print charts
 *
 */

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
