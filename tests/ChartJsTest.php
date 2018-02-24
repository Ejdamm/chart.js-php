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
	const DATA_TYPE_PATTERN = '/data\-chartjs="([^"]+)"/';

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
     * @covers ::__toString
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
     * @covers ::__toString
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsOptions()
    {
        $chart = new ChartJS();
        $html = $chart->renderCanvas();
        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
    
    /**
     * @covers ::__toString
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsType()
    {
		$testType = 'test';
		
        $chart = new ChartJS($testType);
        $html = $chart->renderCanvas();
        
        $matches = [];
        
        $this->assertNotFalse(preg_match(self::DATA_TYPE_PATTERN,$html,$matches));
        
        $type = $matches[1];
        
        $this->assertEquals($type,$testType);
    }
    
    /**
     * @covers ::__toString
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
     * @covers ::__toString
     * @depends testConstruct
     * @depends testRenderCanvasReturnsValidHtml
     */
    public function testCanvasContainsData()
    {
        $chart = new ChartJS();
        $html = $chart->renderCanvas();
        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
        
    }

}
