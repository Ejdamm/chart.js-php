<?php

class ChartJS_Line extends ChartJS
{
    protected $_type = 'line';

    /**
     * Add a set of data
     * @param array $data
     * @param array $colors
     * @param null $name Name can be use to change data later
     */
    public function addLine($data = array(), $colors = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets);
        }
        $this->_datasets[$name]['data'] = $data;
        $this->_datasets[$name]['colors'] = $colors;
    }
}
