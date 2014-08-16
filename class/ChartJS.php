<?php

abstract class ChartJS
{
    /**
     * @var array chart data
     */
    protected $_datasets = array();

    /**
     * @var array chart labels
     */
    protected $_labels = array();

    /**
     * The chart type
     * @var string
     */
    protected $_type = '';

    /**
     * @var array Specific options for chart
     */
    protected $_options = array();

    /**
     * @var string Chartjs canvas' ID
     */
    protected $_id;

    /**
     * @var string Canvas width
     */
    protected $_width;

    /**
     * @var string Canvas height
     */
    protected $_height;

    /**
     * @var array Canvas attributes (class,
     */
    protected $_attributes = array();

    /**
     * @var array Default colors
     */
    protected static $_defaultColors = array('fill' => 'rgba(220,220,220,0.2)', 'stroke' => 'rgba(220,220,220,1)', 'point' => 'rgba(220,220,220,1)', 'pointStroke' => '#fff');


    /**
     * Add label(s)
     * @param array $labels
     * @param bool $reset
     */
    public function addLabels(array $labels, $reset = false)
    {
        if ($reset) {
            $this->_labels = array();
        }

        $this->_labels = $this->_labels + $labels;
    }

    /**
     * Add dataset
     * @param $dataset
     * @param $reset
     */
    public function addDataset($dataset, $reset)
    {
        if ($reset) {
            $this->_datasets = array();
        }

        $this->_datasets += $dataset;
    }

    public function __construct($id = null, $width = '', $height = '', $otherAttributes = array())
    {
        if (!$id) {
            $id = uniqid('chartjs_', true);
        }

        $this->_id = $id;
        $this->_width = $width;
        $this->_height = $height;

        // Always save otherAttributes as array
        if ($otherAttributes && !is_array($otherAttributes)) {
            $otherAttributes = array($otherAttributes);
        }

        $this->_attributes = $otherAttributes;
    }

    /**
     * This method allows to echo ChartJS object and directly renders canvas (instead of using ChartJS->render())
     */
    public function __toString()
    {
        return $this->renderCanvas();
    }

    public function renderCanvas()
    {
        $data = $this->_renderData();
        $options = $this->_renderOptions();
        $height = $this->_renderHeight();
        $width = $this->_renderWidth();

        $attributes = $this->_renderAttributes();

        $canvas = '<canvas id="' . $this->_id . '" data-chartjs="' . $this->_type . '"' . $height . $width . $attributes . $data . $options . '></canvas>';

        return $canvas;
    }

    /**
     * Prepare canvas' attributes
     * @return string
     */
    protected function _renderAttributes()
    {
        $attributes = '';

        foreach ($this->_attributes as $attribute => $value) {
            $attributes .= ' ' . $attribute . '="' . $value . '"';
        }

        return $attributes;
    }

    /**
     * Prepare width attribute for canvas
     * @return string
     */
    protected function _renderWidth()
    {
        $width = '';

        if ($this->_width) {
            $width = ' width="' . $this->_width . '"';
        }

        return $width;
    }

    /**
     * Prepare height attribute for canvas
     * @return string
     */
    protected function _renderHeight()
    {
        $height = '';

        if ($this->_height) {
            $height = ' height="' . $this->_height . '"';
        }

        return $height;
    }

    /**
     * Render custom options for the chart
     * @return string
     */
    protected function _renderOptions()
    {
        if (empty($this->_options)) {
            return '';
        }
        return ' data-options=\'' . json_encode($this->_options) . '\'';
    }


    /**
     * Prepare data (labels and dataset) for the chart
     * @return string
     */
    protected function _renderData()
    {
        $array_data = array('labels' => array(), 'datasets' => array());
        $i = 0;
        foreach ($this->_datasets as $line) {

            $this->_completeColors($line['options'], $i);

            $array_data['datasets'][] = $line['options'] + array('data' => $line['data']);
            $i++;
        }

        $array_data['labels'] = $this->_labels;

        return ' data-data=\'' . json_encode($array_data) . '\'';
    }

    /**
     * Set default colors
     * @param array $defaultColors
     */
    public static function setDefaultColors(array $defaultColors)
    {
        self::$_defaultColors = $defaultColors;
    }

    /**
     * @param array $color
     */
    public static function addDefaultColor(array $color)
    {
        if (!empty($color['fill']) && !empty($color['stroke']) && !empty($color['point']) && !empty($color['pointStroke'])) {
            self::$_defaultColors[] = $color;
        } else {
            trigger_error('Color is missing to add this theme (need fill, stroke, point and pointStroke) : color not added', E_USER_WARNING);
        }
    }

    protected function _completeColors(&$options, &$i)
    {
        if (empty(static::$_defaultColors[$i])) {
            $i = 0;
        }
        $colors = static::$_defaultColors[$i];

        foreach (static::$_colorsRequired as $name) {
            if (empty($options[$name])) {
                $shortName = str_replace('Color', '', $name);

                if (empty($colors[$shortName])) {
                    $shortName = static::$_colorsReplacement[$shortName];
                }

                $options[$name] = $colors[$shortName];
            }
        }
    }
}
