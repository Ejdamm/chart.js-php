<?php

class ChartJS_Line extends ChartJS
{
    protected $_type = 'line';
    protected static $_colorsRequired = array('backgroundColor', 'borderColor', 'pointBackgroundColor', 'pointBorderColor', 'pointHoverBackgroundColor', 'pointHoverBorderColor');
    protected static  $_colorsReplacement = array('pointHoverBackground' => 'pointBackground', 'pointHoverBorder' => 'pointBorder');

    /**
     * Add a set of data
     * @param array $data
     * @param null $name Name can be use to change data later
     */
    public function addLine($data = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets);
        }
        $this->_datasets[$name]['data'] = $data;
    }
}
