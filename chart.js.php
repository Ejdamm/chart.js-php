<?php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';
require 'class/ChartJS_Bar.php';
require 'class/ChartJS_Radar.php';

$array_values = array(array(65, 59, 80, 81, 56, 55, 40), array(28, 48, 40, 19, 86, 27, 90));
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
<script src="Chart.js"></script>
<script src="chart.js-php.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>
</body>
</html>
