<?php
require '../vendor/autoload.php';
use ChartJs\ChartJS;


$values = [
            [28, 48, 40, 19, 86, 27, 90],
            [65, 59, 80, 81, 56, 55, 40]
        ];

$data = [
    'labels' => ["January", "February", "March", "April", "May", "June", "July"],
    'datasets' => [] //You can add datasets directly here or add them later with addDataset()
];

$colors = [
              ['backgroundColor' => 'rgba(28,116,190,.8)', 'borderColor' => 'blue'],
              ['backgroundColor' => '#f2b21a', 'borderColor' => '#e5801d'],
              ['backgroundColor' => ['blue', 'purple', 'red', 'black', 'brown', 'pink', 'green']]
          ];

//There is a bug in Chart.js that ignores canvas width/height if responsive is not set to false
$options = ['responsive' => false];

//html attributes fot the canvas element
$attributes = ['id' => 'example', 'width' => 500, 'height' => 500, 'style' => 'display:inline;'];

$datasets = [
                ['data' => $values[0], 'label' => "Legend1"] + $colors[0],
                ['data' => $values[1], 'label' => "Legend2"] + $colors[1],
                ['data' => $values[0], 'label' => "Legend1"] + $colors[1],
                ['data' => $values[1], 'label' => "Legend2"] + $colors[2],
                ['data' => $values[0]] + $colors[2],
            ];

/*
 * Create charts
 *
 */

$attributes['id'] = 'example_line';
$Line = new ChartJS('line', $data, $options, $attributes);
$Line->addDataset($datasets[0]);
$Line->addDataset($datasets[1]);

$attributes['id'] = 'example_bar';
$Bar = new ChartJS('bar', $data, $options, $attributes);
$Bar->addDataset($datasets[2]);
$Bar->addDataset($datasets[3]);

$attributes['id'] = 'example_radar';
$Radar = new ChartJS('radar', $data, $options, $attributes);
$Radar->addDataset($datasets[0]);
$Radar->addDataset($datasets[1]);

$attributes['id'] = 'example_polarArea';
$PolarArea = new ChartJS('polarArea', $data, $options, $attributes);
$PolarArea->addDataset($datasets[4]);

$attributes['id'] = 'example_pie';
$Pie = new ChartJS('pie', $data, $options, $attributes);
$Pie->addDataset($datasets[4]);

$attributes['id'] = 'example_doughnut';
$Doughnut = new ChartJS('doughnut', $data, $options, $attributes);
$Doughnut->addDataset($datasets[4]);


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

<script src="../js/Chart.min.js"></script>
<script src="../js/driver.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>
</body>
</html>
