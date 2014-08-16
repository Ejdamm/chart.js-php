<?php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';

$Line = new ChartJS_Line('example', 500, 500);
$Line->addLine(array(1, 2, 3, 4));
$Line->addLabels(array('A label', 'Another', 'Another one', 'The last one'));

?><!DOCTYPE html>
<html>
  <head>
    <title>Chart.js-PHP</title>
  </head>
  <body>
    <?php
      echo $Line;
    ?>      
    <script src="Chart.js"></script>
    <script src="chart.js-php.js"></script>
    <script>
      (function() {
        loadChartJsPhp();
      })();
    </script>
  </body>
</html>