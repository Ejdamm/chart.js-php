(function() {
	loadChartJsPhp();
})();

var ChartJSPHP = {};

function loadChartJsPhp() {
	var elements = document.querySelectorAll("[data-chartjs]");
	
	for (var i in elements)
	{
		if (i === 'length' || i === 'item') {
			continue;
		}
		var element = elements[i]; 
		var id = element.id;
		var ctx = document.getElementById(id).getContext('2d');
		
		var htmldata = element.dataset;
		// var options = JSON.parse(htmldata.options);
		var data = JSON.parse(htmldata.data);
		
		var type = htmldata.chartjs;
		
		console.log(data);
		
		new Chart(ctx).Line(data);		
	}
	
};