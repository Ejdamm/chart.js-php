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

$array_values = array(array(28, 48, 40, 19, 86, 27, 90), array(65, 59, 80, 81, 56, 55, 40));
$array_labels = array("January", "February", "March", "April", "May", "June", "July");
//There is a bug in Chart.js that ignores canvas width/height if responsive != false
$options = array('responsive' => false);

$Line = new ChartJS_Line('example_line', 500, 500, $options);
$Line->addLine($array_values[0]);
$Line->addLine($array_values[1]);
$Line->addLabels($array_labels);


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

<script src="Chart.js"></script>
<script src="chart.js-php.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>
</body>
</html>
