<?php

use PHPUnit\Framework\TestCase;
use pStats\Outliers;

class OutliersTest extends TestCase
{
	
	public function testOutlierAroundMean()
	{
		$data = [5.6, 3.8, 2.9, 5.1, 4.2, 6.9, 2.56, 3.65, 4.89, 2.01, 9.65, 0.2, 5.12, 4.44, 3.55, 8.65, 1.2, 0, 6.5, 4.26, 3.55, 4.23, 6.1, 4.163, 4.06];
		
		$outliers = Outliers::outlierAroundMean($data);
		
		$this->assertCount(1, $outliers);
		$this->assertEquals(9.65, $outliers[0]);
	}
	
	
	public function testMadCalculate()
	{
		$data = [5.6, 3.8, 2.9, 5.1, 4.2, 6.9, 2.56, 3.65, 4.89, 2.01, 9.65, 0.2, 5.12, 4.44, 3.55, 8.65, 1.2, 0, 6.5, 4.26, 3.55, 4.23, 6.1, 4.163, 4.06];
		
		$mad = Outliers::madCalculate($data);
		
		$this->assertEquals(1.363992, $mad, '', 0.0001);
	}
	
	
	public function testOutlierAroundMedian()
	{
		$data = [5.6, 3.8, 2.9, 5.1, 4.2, 6.9, 2.56, 3.65, 4.89, 2.01, 9.65, 0.2, 5.12, 4.44, 3.55, 8.65, 1.2, 0, 6.5, 4.26, 3.55, 4.23, 6.1, 4.163, 4.06];
		
		$outliers = Outliers::outlierAroundMedian($data);
		
		$this->assertCount(4, $outliers);
		
		$this->assertContains(9.65, $outliers);
		$this->assertContains(0.2, $outliers);
		$this->assertContains(8.65, $outliers);
		$this->assertContains(0, $outliers);
	}
	
	
}

?>