<?php

class ChartJS_Line extends ChartJS
{
    protected $_type = 'Line';


    protected function _renderData()
    {
        $data = '';
        $array_data = array('labels' => array(), 'datasets' => array());
        foreach ($this->_data as $line) {
            $array_data['datasets'][] = $line['options'] + array('data' => $line['data']);
        }

        $array_data['labels'] = $this->_labels;

        return ' data-data=\'' . json_encode($array_data) . '\'';
    }

    /**
     * Add a set of data
     * @param array $data
     * @param array $options
     * @param null $name Name cas be use to change data / options later
     */
    public function addLine($data = array(), $options = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_data) + 1;
        }
        $this->_data[$name]['data'] = $data;
        $this->_data[$name]['options'] = $options;
    }

}
