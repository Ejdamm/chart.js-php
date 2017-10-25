<?php

class ChartJS_Bar extends ChartJS
{
    protected $_type = 'bar';
    protected static $_colorsRequired = array('backgroundColor', 'borderColor', 'hoverBackgroundColor', 'hoverBorderColor');
    protected static $_colorsReplacement = array('hoverBackground' => 'background', 'hoverBorder' => 'border');

    /**
     * Add a set of data
     * @param array $data
     * @param array $options
     * @param null $name Name can be use to change data / options later
     */
    public function addBars($data = array(), $options = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets);
        }
        $this->_datasets[$name]['data'] = $data;
        $this->_datasets[$name]['options'] = $options;
    }

}
