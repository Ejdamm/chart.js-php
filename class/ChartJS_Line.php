<?php

class ChartJS_Line extends ChartJS
{
    protected $_type = 'Line';

    /**
     * Add a set of data
     * @param array $data
     * @param array $options
     * @param null $name Name cas be use to change data / options later
     */
    public function addLine($data = array(), $options = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets) + 1;
        }
        $this->_datasets[$name]['data'] = $data;
        $this->_datasets[$name]['options'] = $options;
    }

}
