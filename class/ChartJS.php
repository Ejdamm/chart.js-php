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
     * @var array Default options
     */
    protected $_default = array(
        'global' => array(
            // Boolean - Whether to animate the chart
            'animation' => true,

            // Number - Number of animation steps
            'animationSteps' => 60,

            // String - Animation easing effect
            'animationEasing' => "easeOutQuart",

            // Boolean - If we should show the scale at all
            'showScale' => true,

            // Boolean - If we want to override with a hard coded scale
            'scaleOverride' => false,

            // ** Required if scaleOverride is true **
            // Number - The number of steps in a hard coded scale
            'scaleSteps' => null,
            // Number - The value jump in the hard coded scale
            'scaleStepWidth' => null,
            // Number - The scale starting value
            'scaleStartValue' => null,

            // String - Colour of the scale line
            'scaleLineColor' => "rgba(0,0,0,.1)",

            // Number - Pixel width of the scale line
            'scaleLineWidth' => 1,

            // Boolean - Whether to show labels on the scale
            'scaleShowLabels' => true,

            // Interpolated JS string - can access value
            'scaleLabel' => "<%=value%>",

            // Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
            'scaleIntegersOnly' => true,

            // Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            'scaleBeginAtZero' => false,

            // String - Scale label font declaration for the scale label
            'scaleFontFamily' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

            // Number - Scale label font size in pixels
            'scaleFontSize' => 12,

            // String - Scale label font weight style
            'scaleFontStyle' => "normal",

            // String - Scale label font colour
            'scaleFontColor' => "#666",

            // Boolean - whether or not the chart should be responsive and resize when the browser does.
            'responsive' => false,

            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            'maintainAspectRatio' => true,

            // Boolean - Determines whether to draw tooltips on the canvas or not
            'showTooltips' => true,

            // Array - Array of string names to attach tooltip events
            'tooltipEvents' => ["mousemove", "touchstart", "touchmove"],

            // String - Tooltip background colour
            'tooltipFillColor' => "rgba(0,0,0,0.8)",

            // String - Tooltip label font declaration for the scale label
            'tooltipFontFamily' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

            // Number - Tooltip label font size in pixels
            'tooltipFontSize' => 14,

            // String - Tooltip font weight style
            'tooltipFontStyle' => "normal",

            // String - Tooltip label font colour
            'tooltipFontColor' => "#fff",

            // String - Tooltip title font declaration for the scale label
            'tooltipTitleFontFamily' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

            // Number - Tooltip title font size in pixels
            'tooltipTitleFontSize' => 14,

            // String - Tooltip title font weight style
            'tooltipTitleFontStyle' => "bold",

            // String - Tooltip title font colour
            'tooltipTitleFontColor' => "#fff",

            // Number - pixel width of padding around tooltip text
            'tooltipYPadding' => 6,

            // Number - pixel width of padding around tooltip text
            'tooltipXPadding' => 6,

            // Number - Size of the caret on the tooltip
            'tooltipCaretSize' => 8,

            // Number - Pixel radius of the tooltip border
            'tooltipCornerRadius' => 6,

            // Number - Pixel offset from point x to tooltip edge
            'tooltipXOffset' => 10,

            // String - Template string for single tooltips
            'tooltipTemplate' => "<%if (label){%><%=label%> => <%}%><%= value %>",

            // String - Template string for single tooltips
            'multiTooltipTemplate' => "<%= value %>",

            // Function - Will fire on animation progression.
            'onAnimationProgress' => 'function(){}',

            // Function - Will fire on animation completion.
            'onAnimationComplete' => 'function(){}'
        )
    );

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
        $data = '';
        $array_data = array('labels' => array(), 'datasets' => array());
        foreach ($this->_datasets as $line) {
            $array_data['datasets'][] = $line['options'] + array('data' => $line['data']);
        }

        $array_data['labels'] = $this->_labels;

        return ' data-data=\'' . json_encode($array_data) . '\'';
    }
}
