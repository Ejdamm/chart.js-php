<?php

class ChartJS_Radar extends ChartJS
{
    protected $_type = 'radar';

    /**
     * Add a set of data
     * @param array $data
     * @param array $colors
     * @param legend
     * @param array $options
     * @param null $name Name can be use to change data / options later
     */
    public function addRadar($data = array(), $colors = array(), $legend = '', $advanced = array(), $name = null)
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
