<?php

use PHPUnit\Framework\TestCase;
use pStats\Frequency;
use pStats\Error;

class ErrorTests extends TestCase
{
	/**
	 *  Tests the 'Frequency::absoluteError' method.
	 */
	public function testAbsoluteError()
	{		
		$aerror = Error::absoluteError(0, 0);
		$this->assertEquals(0, 		$aerror);
		
		$aerror = Error::absoluteError(2, 2.2);
		$this->assertEquals(0.2, 	$aerror);
		
		$aerror = Error::absoluteError(3, 3);
		$this->assertEquals(0, 		$aerror);
		
		$aerror = Error::absoluteError(5, 6);
		$this->assertEquals(1, 		$aerror);
		
		$aerror = Error::absoluteError(7.2, 7);
		$this->assertEquals(0.2, 	$aerror);
		
		$aerror = Error::absoluteError(6, 5);
		$this->assertEquals(1, 		$aerror);
		
		$aerror = Error::absoluteError(3, 0);
		$this->assertEquals(3, 		$aerror);
		
		$aerror = Error::absoluteError(2.1, 2);
		$this->assertEquals(0.1, 	$aerror);
		
		$aerror = Error::absoluteError(9, 7);
		$this->assertEquals(2, 		$aerror);
		
		$aerror = Error::absoluteError(5.4, 5);
		$this->assertEquals(0.4, 	$aerror);
	}
	
	
	/**
	 *  Tests the 'Frequency::mae' method.
	 */
	public function testMeanAbsoluteError()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$predictions 	= 	[0, 2.2,3, 4, 7,   5, 0, 2,	  7, 5];
		
		$mae = Error::mae($actuals, $predictions);
		$this->assertEquals(0.790, $mae);
	}
	
	
	
	/**
	 *  Tests the 'Frequency::mse' method.
	 */
	public function testMeanSquaredError()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$predictions 	= 	[0, 2.2,3, 4, 7,   5, 0, 2,	  7, 5];
	
		$mae = Error::mse($actuals, $predictions);
		$this->assertEquals(1.525, $mae);
	}
	
	
	
	/**
	 *  Tests the 'Frequency::variance' method.
	 */
	public function testVariance()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$variance = Error::variance($actuals);
		$this->assertEquals(6.708, $variance);
		
		$actuals 		= 	[600, 470, 170, 430, 300];
		$variance = Error::variance($actuals, true);
		$this->assertEquals(21704, $variance);
		
		$actuals 		= 	[600, 470, 170, 430, 300];
		$variance = Error::variance($actuals, false);
		$this->assertEquals(27130, $variance);
	}
	
	
	/**
	 *  Tests the 'Frequency::std' method.
	 */
	public function testStd()
	{
		$actuals 		= 	[0, 2, 	3, 5, 7.2, 6, 3, 2.1, 9, 5.4];
		$std = Error::std($actuals);
		$this->assertEquals(2.59, $std);
	
		$actuals 		= 	[600, 470, 170, 430, 300];
		$std = Error::std($actuals);
		$this->assertEquals(147.323, $std);
	}
	
	
	
}

?>