<?php

class ChartJS_Doughnut extends ChartJS_Pie
{
    protected $_type = 'doughnut';
    protected static $_colorsRequired = array('backgroundColor', 'borderColor', 'hoverBackgroundColor', 'hoverBorderColor');
    protected static $_colorsReplacement = array('hoverBackground' => 'pointBackground', 'hoverBorder' => 'pointBorder');
}
