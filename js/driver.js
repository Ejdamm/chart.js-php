// Will be filled with canvas
var ChartJSPHP = new Array();

// You must call this function after document.ready
function loadChartJsPhp() {
	// Getting all chart.js canvas
	var elements = document.querySelectorAll("[data-chartjs]");

	// Looping every canvas
	for (var canvas of elements) {
		var id = canvas.id;

		// Getting ctx from canvas
		var ctx = canvas.getContext('2d');

		// Getting values in data attributes
		var htmldata = canvas.dataset;
		var type = htmldata.chartjs;
		var data = JSON.parse(htmldata.data);
		var options = JSON.parse(htmldata.options);
		evalFunctions(options)
		var config = {type:type, data:data, options:options};

		// Creating chart and saving for later use
		ChartJSPHP[id] = new Chart(ctx, config);
	}
};

//Converts functions in json from strings to actual functions
function evalFunctions(chartArray) {
	for (var key in chartArray) {
		var value = chartArray[key];
		if (value instanceof Array || value instanceof Object ) {
			evalFunctions(value);
		} else if (typeof value === "string" && value.indexOf('function(') == 0) {
			chartArray[key] = eval("(" + value + ")");
		}
	}
}
