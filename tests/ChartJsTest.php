<?php

namespace ChartJs\Tests;

use ChartJs\ChartJS;

/**
 * @coversDefaultClass ChartJs\ChartJS
 */
class ChartJsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var string
     */
    const HTML_TAG_PATTERN = '/^<canvas ("[^"]*"|\'[^\']*\'|[^\'">])*><\/canvas>$/';

    /**
     * @var string
     */
    const DATA_OPTIONS_PATTERN = '/data\-options=\'([^\']+)\'/';

	/**
	 * @var string
	 */
	const DATA_TYPE_PATTERN = '/data\-chartjs=\'([^ ]+)\'/';

    /**
     * @return void
     */
    public function testConstruct()
    {
        $chart = new ChartJS();
    }

    /**
     * @covers ::renderCanvas
     * @depends testConstruct
     */
    public function testRenderCanvasReturnsValidHtml()
    {
        $chart = new ChartJS();
        $html = $chart->renderCanvas();
        $this->assertNotFalse(preg_match(self::HTML_TAG_PATTERN,$html));
    }

    /**
     * @covers ::__toString
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testEchoChartEqualsRendering()
    {
        $chart = new ChartJS();
        $html = $chart->renderCanvas();
        ob_start();
        echo $chart;
        $string = ob_get_contents();
        ob_end_clean();
        $this->assertEquals($html,$string);
    }

    /**
     * @covers ::renderCanvas
     * @covers ::renderAttributes
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsAttributes()
    {
        $chart = new ChartJS();
        $html = $chart->renderCanvas();
        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers ::renderCanvas
     * @covers ::renderOptions
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsOptions()
    {
        $expected = 'test';
        $chart = new ChartJS(null, null, $expected);
        $html = $chart->renderCanvas();
        $matches = [];
        $this->assertNotFalse(preg_match(self::DATA_OPTIONS_PATTERN,$html ,$matches));
        $result = isset($matches[1]) ? json_decode($matches[1]) : null;
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers ::renderCanvas
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsType()
    {
        $expected = 'test';
        $chart = new ChartJS($expected);
        $html = $chart->renderCanvas();
        $matches = [];
        $this->assertNotFalse(preg_match(self::DATA_TYPE_PATTERN,$html ,$matches));
        $result = isset($matches[1]) ? $matches[1] : null;
        $this->assertEquals($expected, $result);
    }

    /**
     * @covers ::renderCanvas
     * @covers ::renderData
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsLabels()
    {
        $chart = new ChartJS();
        $html = $chart->renderCanvas();
        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers ::renderCanvas
     * @covers ::renderData
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsDatasets()
    {
        $chart = new ChartJS();
        $html = $chart->renderCanvas();
        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

}
