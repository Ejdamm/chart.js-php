<?php

namespace ChartJs;

class ChartJS
{
    /**
     * @var array chart data
     */
    private $data = [];

    /**
     * The chart type
     * @var string
     */
    private $type = '';

    /**
     * @var array Specific options for chart
     */
    private $options = [];

    /**
     * @var array Canvas html attributes
     */
    private $attributes = [];

    public function __construct($type = 'line', $data = [], $options = [], $attributes = [])
    {
        $this->type = $type;
        $this->data = $data;
        $this->options = $options;

        // Always save attributes as array
        if ($attributes && !is_array($attributes)) {
            $attributes = [$attributes];
        }

        $this->attributes = $attributes;
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
        $renderedData = $this->renderData();
        $renderedOptions = $this->renderOptions();
        $renderedAttributes = $this->renderAttributes();
        $canvas = "<canvas$renderedAttributes data-chartjs='" . $this->type . "' $renderedData $renderedOptions></canvas>";

        return $canvas;
    }

    /**
     * Add a set of data
     * @param array $dataset
     */
    public function addDataset($dataset)
    {
        $this->data['datasets'][] = $dataset;
    }

    /**
     * Prepare canvas' attributes
     * @return string
     */
    private function renderAttributes()
    {
        $attributes = '';
        if (!isset($this->attributes['id'])) {
            $this->attributes['id'] = uniqid('chartjs_', true);
        }

        foreach ($this->attributes as $attribute => $value) {
            $attributes .= ' ' . $attribute . '="' . $value . '"';
        }

        return $attributes;
    }

    /**
     * Render custom options for the chart
     * @return string
     */
    private function renderOptions()
    {
        if (empty($this->options)) {
            return 'data-options=\'null\'';
        }
        return 'data-options=\'' . json_encode($this->options) . '\'';
    }

    /**
     * Prepare data (labels and dataset) for the chart
     * @return string
     */
    private function renderData()
    {
        if (empty($this->data)) {
            return 'data-data=\'null\'';
        }
        return 'data-data=\'' . json_encode($this->data) . '\'';
    }
}
