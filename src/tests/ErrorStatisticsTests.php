<?php

use PHPUnit\Framework\TestCase;
use pStats\FrequencyStatistics;
use pStats\ErrorStatistics;

class ErrorStatisticsTests extends TestCase
{
	/**
	 *  Tests the 'FrequencyStatistics::absoluteError' method.
	 */
	public function testAbsoluteError()
	{		
		$aerror = ErrorStatistics::absoluteError(0, 0);
		$this->assertEquals(0, 		$aerror);
		
		$aerror = ErrorStatistics::absoluteError(2, 2.2);
		$this->assertEquals(0.2, 	$aerror);
		
		$aerror = ErrorStatistics::absoluteError(3, 3);
		$this->assertEquals(0, 		$aerror);
		
		$aerror = ErrorStatistics::absoluteError(5, 6);
		$this->assertEquals(1, 		$aerror);
		
		$aerror = ErrorStatistics::absoluteError(7.2, 7);
		$this->assertEquals(0.2, 	$aerror);
		
		$aerror = ErrorStatistics::absoluteError(6, 5);
		$this->assertEquals(1, 		$aerror);
		
		$aerror = ErrorStatistics::absoluteError(3, 0);
		$this->assertEquals(3, 		$aerror);
		
		$aerror = ErrorStatistics::absoluteError(2.1, 2);
		$this->assertEquals(0.1, 	$aerror);
		
		$aerror = ErrorStatistics::absoluteError(9, 7);
		$this->assertEquals(2, 		$aerror);
		
		$aerror = ErrorStatistics::absoluteError(5.4, 5);
		$this->assertEquals(0.4, 	$aerror);
	}
	
	
	/**
	 *  Tests the 'FrequencyStatistics::mae' method.
	 */
	public function testMeanAbsoluteError()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$predictions 	= 	[0, 2.2,3, 4, 7,   5, 0, 2,	  7, 5];
		
		$mae = ErrorStatistics::mae($actuals, $predictions);
		$this->assertEquals(0.790, $mae);
	}
	
	
	
	/**
	 *  Tests the 'FrequencyStatistics::mse' method.
	 */
	public function testMeanSquaredError()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$predictions 	= 	[0, 2.2,3, 4, 7,   5, 0, 2,	  7, 5];
	
		$mae = ErrorStatistics::mse($actuals, $predictions);
		$this->assertEquals(1.525, $mae);
	}
	
	
	
	/**
	 *  Tests the 'FrequencyStatistics::variance' method.
	 */
	public function testVariance()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$variance = ErrorStatistics::variance($actuals);
		$this->assertEquals(6.708, $variance);
		
		$actuals 		= 	[600, 470, 170, 430, 300];
		$variance = ErrorStatistics::variance($actuals);
		$this->assertEquals(21704, $variance);
	}
	
	
	/**
	 *  Tests the 'FrequencyStatistics::std' method.
	 */
	public function testStd()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$std = ErrorStatistics::std($actuals);
		$this->assertEquals(2.59, $std);
	
		$actuals 		= 	[600, 470, 170, 430, 300];
		$std = ErrorStatistics::std($actuals);
		$this->assertEquals(147.323, $std);
	}
	
	
	
}

?>