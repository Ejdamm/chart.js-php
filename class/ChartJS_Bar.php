<?php

class ChartJS_Bar extends ChartJS
{
    protected $_type = 'Bar';
    protected static $_colorsRequired = array('fillColor', 'strokeColor', 'highlightFill', 'highlightStroke');
    protected static $_colorsReplacement = array('highlightFill' => 'fill', 'highlightStroke' => 'stroke');

    /**
     * Add a set of data
     * @param array $data
     * @param array $options
     * @param null $name Name can be use to change data / options later
     */
    public function addBars($data = array(), $options = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets) + 1;
        }
        $this->_datasets[$name]['data'] = $data;
        $this->_datasets[$name]['options'] = $options;
    }

}
