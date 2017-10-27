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
$colors = array(array('backgroundColor' => 'rgba(28,116,190,.8)', 'borderColor' => '#1c74be', 'pointBackgroundColor' => '#1c74be', 'pointBorderColor' => '#1c74be'),
          array('backgroundColor' => '#f2b21a', 'borderColor' => '#e5801d', 'pointBackgroundColor' => '#e5801d', 'pointBorderColor' => '#e5801d'));
//There is a bug in Chart.js that ignores canvas width/height if responsive is not set to false
$options = array('responsive' => false);

$Line = new ChartJS_Line('example_line', 500, 500, $labels, $options);
$Line->addLine($data[0], $colors[0], "legend1");
$Line->addLine($data[1], $colors[1], "legend2");

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
