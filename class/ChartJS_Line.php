<?php

class ChartJS_Line extends ChartJS
{
    protected $_type = 'line';

    /**
     * Add a set of data
     * @param array $data
     * @param array $colors
     * @param string $legend
     * @param array $advanced
     * @param null $name Name can be use to change data later
     */
    public function addLine($data = array(), $colors = array(), $legend = '', $advanced = array(), $name = null)
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
