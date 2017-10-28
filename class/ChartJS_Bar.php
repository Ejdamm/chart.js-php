<?php

class ChartJS_Bar extends ChartJS
{
    protected $_type = 'bar';

    /**
     * Add a set of data
     * @param array $data
     * @param array $colors
     * @param string $legend
     * @param array $options
     * @param null $name Name can be use to change data / options later
     */
    public function addBars($data = array(), $colors = array(), $legend = '', $advanced = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets);
        }
        $this->_datasets[$name]['data'] = $data;
        $this->_datasets[$name]['colors'] = $colors;
        $this->_datasets[$name]['legend'] = $legend;
        $this->_datasets[$name]['advanced'] = $advanced;
    }

}
