<?php

class ChartJS_Radar extends ChartJS
{
    protected $_type = 'radar';
    protected static $_colorsRequired = array('backgroundColor', 'borderColor', 'pointBackgroundColor', 'pointBorderColor', 'pointHoverBackgroundColor', 'pointHoverBorderColor');
    protected static $_colorsReplacement = array('pointHoverBackground' => 'pointBackground', 'pointHoverBorder' => 'pointBorder');

    /**
     * Add a set of data
     * @param array $data
     * @param array $options
     * @param null $name Name cas be use to change data / options later
     */
    public function addRadar($data = array(), $options = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets);
        }
        $this->_datasets[$name]['data'] = $data;
        $this->_datasets[$name]['options'] = $options;
    }

}
