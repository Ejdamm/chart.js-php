<?php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';

$array_line = array(1, 4, 8, 2, 6, 5, 7, 20, 15);


$Line = new ChartJS_Line('test', 500, 500);
$Line->addLine($array_line);
$Line->addLabels(array(1, 2, 3, 4, 5, 6, 7, 8, 9));

?><!DOCTYPE html>
<html>
	<head>
	<title>Chart.js - PHPWrap</title>
	</head>
	<body>
		<?php
		echo $Line;
		?>		
		<script src="Chart.js"></script>
		<script src="chart.js-php.js"></script>
	</body>
</html>