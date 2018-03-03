<?php

namespace ChartJs;

class ChartJS
{
    /**
     * @var array chart datasets
     */
    private $datasets = [];

    /**
     * @var array chart labels
     */
    private $labels = [];

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

    public function __construct($type = 'line', $labels = [], $options = [], $attributes = [])
    {
        $this->type = $type;
        $this->labels = $labels;
        $this->options = $options;

        // Always save otherAttributes as array
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
        $data = $this->renderData();
        $options = $this->renderOptions();
        $attributes = $this->renderAttributes();
        $canvas = "<canvas$attributes data-chartjs=\"" . $this->type . "\" $data $options></canvas>";

        return $canvas;
    }

    /**
     * Add a set of data
     * @param array $dataset
     * @param null $name Name can be used to identify a dataset
     */
    public function addDataset($dataset, $name = null)
    {
        if (!$name) {
            $name = count($this->datasets);
        }
        $this->datasets[$name] = $dataset;
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
            return ' data-options=\'null\'';
        }
        return ' data-options=\'' . json_encode($this->options) . '\'';
    }

    /**
     * Prepare data (labels and dataset) for the chart
     * @return string
     */
    private function renderData()
    {
        $array_data = ['labels' => $this->labels, 'datasets' => $this->datasets];

        return ' data-data=\'' . json_encode($array_data) . '\'';
    }
}
