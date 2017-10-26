Chart.js-PHP
============

A PHP wrapper for [chartjs/Chart.js](https://github.com/chartjs/Chart.js)

When using a lot of charts in a project, we need to write a lot of code. 

This small PHP wrapper use `data-attributes` to load chart with Chart.js with less code.

This project is an expansion of [HugoHeneault's](https://github.com/HugoHeneault/Chart.js-PHP) repository

## Charts implemented
* Line
* ~~~Bar~~~
* ~~~Radar~~~
* ~~~Polar Area~~~
* ~~~Pie & Doughnut~~~


## How to use
Include Chart.js and chart.js-php.js before the end of your body (change src according to your project)
```html
<html>
  <body>
    <!-- Your awesome project comes here -->
    
    <!-- And here are Chart.js and Chart.js-PHP -->
    <script src="js/Chart.js"></script>
    <script src="js/chart.js-php.js"></script>
  </body>
</html>
```

Load ChartJS-PHP classes or use an autoloader
```php
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';
```

Then, create your charts using PHP. 
```php
$Line = new ChartJS_Line('example', 500, 500);
$Line->addLine(array(1, 2, 3, 4));
$Line->addLabels(array('A label', 'Another', 'Another one', 'The last one'));

// Echo your line
echo $Line;
?>
```

Finally, load these charts with a small piece of javascript when your document is ready
```js
// Pure JS document.ready
(function() {
  loadChartJsPhp();
})();
```

## Full example
```php
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
```

## Contributing
Do not hesitate to edit or improve my code with bugfix and new functionnalities !
