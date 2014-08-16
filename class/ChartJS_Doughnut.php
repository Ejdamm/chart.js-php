<?php

class ChartJS_Doughnut extends ChartJS_Pie
{
    protected $_type = 'Doughnut';
    protected static $_colorsRequired = array('color', 'highlight');
    protected static $_colorsReplacement = array('color' => 'fill', 'highlight' => 'stroke');

	// More options soon
}
