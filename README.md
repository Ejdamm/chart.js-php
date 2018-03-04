Chart.js-PHP
============
[![Build Status](https://travis-ci.org/Ejdamm/Chart.js-PHP.svg?branch=master)](https://travis-ci.org/Ejdamm/Chart.js-PHP)

A PHP wrapper for [chartjs/Chart.js](https://github.com/chartjs/Chart.js)
This project is an expansion of [HugoHeneault's](https://github.com/HugoHeneault/Chart.js-PHP) repository

## How to use
Include [js/Chart.min.js](js/Chart.min.js) and [js/driver.js](js/driver.js) before the end of your body (change src according to your project). If you want to use CDN instead see [here](. For CDN see here https://cdnjs.com/libraries/Chart.js)
```html
<html>
  <body>
    <!-- Your awesome project comes here -->

    <!-- And here are Chart.js -->
    <script src="js/Chart.min.js"></script>
    <script src="js/driver.js"></script>
  </body>
</html>
```

Install ChartJS-PHP via composer
```json
{
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/Ejdamm/Chart.js-PHP"
        }],
    "require": {
        "Ejdamm/Chart.js-PHP": "dev-master"
    }
}
```

Then, create your charts using PHP.
```php
$data = [
    'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
    'datasets' => [[
        'data' =>[8, 7, 8, 9, 6],
        'backgroundColor' => '#f2b21a',
        'borderColor' => '#e5801d',
        'label' => 'Legend'
    ]]
];
$options = [];
$attributes = ['id' => 'example', 'width' => 500, 'height' => 500];
$Line = new ChartJs\ChartJS('line', $data, $options, $attributes);

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
require 'vendor/autoload.php';
use ChartJs\ChartJS;

$data = [
    'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
    'datasets' => [[
        'data' =>[8, 7, 8, 9, 6],
        'backgroundColor' => '#f2b21a',
        'borderColor' => '#e5801d',
        'label' => 'Legend'
    ]]
];
$options = ['responsive' => false];
$attributes = ['id' => 'example', 'width' => 500, 'height' => 500];
$Line = new ChartJS('line', $data, $options, $attributes);

?><!DOCTYPE html>
<html>
  <head>
    <title>Chart.js-PHP</title>
  </head>
  <body>
    <?php
      echo $Line;
    ?>
    <script src="vendor/Ejdamm/Chart.js-PHP/js/Chart.min.js"></script>
    <script src="vendor/Ejdamm/Chart.js-PHP/js/driver.js"></script>
    <script>
      (function() {
        loadChartJsPhp();
      })();
    </script>
  </body>
</html>
```

## Documentation
Full documentation is available at [Chart.js](http://www.chartjs.org/docs/latest/charts/) website. There you can find what type of charts and associated properties are available.

## Time axis
If you are going to use time axis you need either to include Moment.js or Chart.bundle.js instead of Chart.js to your project. Chart.bundle.js consists of both Chart.js and Moment.js (which is needed for time axis).

## Contributing
Do not hesitate to edit or improve my code with bugfix and new functionalities!
