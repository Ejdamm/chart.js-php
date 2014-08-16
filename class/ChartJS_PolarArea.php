<?php

class ChartJS_PolarArea extends ChartJS
{
    protected $_type = 'PolarArea';
    protected static $_colorsRequired = array('color', 'highlight');
    protected static $_colorsReplacement = array('color' => 'fill', 'highlight' => 'stroke');

    /**
     * Add a set of data
     * @param float $value
     * @param array $options
     * @param null $name Name cas be use to change data / options later
     */
    public function addSegment($value, $options = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets) + 1;
        }
        $this->_datasets[$name]['value'] = $value;
        $this->_datasets[$name]['options'] = $options;
    }

    /**
     * Prepare data (dataset and labels) for the PolarArea
     */
    protected function _renderData()
    {
        $array_data = array();
        $i = 0;

        foreach ($this->_datasets as $segment) {

            $this->_completeColors($segment['options'], $i);

            $array_data[] = $segment['options'] + array('label' => $this->_labels[$i]) + array('value' => $segment['value']);
            $i++;
        }

        return ' data-data=\'' . json_encode($array_data) . '\'';
    }
}
