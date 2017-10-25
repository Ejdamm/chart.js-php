<?php

class ChartJS_Pie extends ChartJS
{
    protected $_type = 'pie';
    protected static $_colorsRequired = array('backgroundColor', 'borderColor', 'hoverBackgroundColor', 'hoverBorderColor');
    protected static $_colorsReplacement = array('hoverBackground' => 'pointBackground', 'hoverBorder' => 'pointBorder');

    /**
     * Add a set of data
     * @param float $value
     * @param array $options
     * @param null $name Name cas be use to change data / options later
     */
    public function addParts($data = array(), $options = array(), $name = null)
    {
        if (!$name) {
            $name = count($this->_datasets);
        }
        $this->_datasets[$name]['data'] = $data;
        $this->_datasets[$name]['options'] = $options;
    }

    protected function _completeColors(&$options, &$i)
    {
        $j = 0;
        foreach ($this->_datasets[$i]['data'] as $value) {
            $count = count(static::$_defaultColors);
            $colors = static::$_defaultColors[$j++ % $count];

            foreach (static::$_colorsRequired as $name) {
                if (empty($options[$name])) {
                    $options[$name] = array();
                }
                $shortName = str_replace('Color', '', $name);

                if (empty($colors[$shortName])) {
                    $shortName = static::$_colorsReplacement[$shortName];
                }
                $options[$name][] = $colors[$shortName];
            }
        }
    }

}
