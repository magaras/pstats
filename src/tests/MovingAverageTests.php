<?php

use PHPUnit\Framework\TestCase;
use pStats\MovingAverage;

class MovingAverageTests extends TestCase
{
	/**
	 *  Test the 'MovingAverage : simpleMovingAverage' method.
	 */
	public function testSimpleMovingAverage()
	{
		// Tests Case 1
		$data = [20, 22, 24, 25, 23, 26, 28, 26, 29, 27, 28, 30, 27, 29, 28];
		$ma_arr = MovingAverage::simpleMovingAverage(10, $data);
		$this->assertEquals(15, count($ma_arr));
		$this->assertEquals(null, 	$ma_arr[0]);
		$this->assertEquals(null, 	$ma_arr[1]);
		$this->assertEquals(null, 	$ma_arr[2]);
		$this->assertEquals(null, 	$ma_arr[3]);
		$this->assertEquals(null, 	$ma_arr[4]);
		$this->assertEquals(null, 	$ma_arr[5]);
		$this->assertEquals(null, 	$ma_arr[6]);
		$this->assertEquals(null, 	$ma_arr[7]);
		$this->assertEquals(null, 	$ma_arr[8]);
		$this->assertEquals(25, 	$ma_arr[9]);
		$this->assertEquals(25.8, 	$ma_arr[10]);
		$this->assertEquals(26.6, 	$ma_arr[11]);
		$this->assertEquals(26.9, 	$ma_arr[12]);
		$this->assertEquals(27.3, 	$ma_arr[13]);
		$this->assertEquals(27.8, 	$ma_arr[14]);
		
		
		
		// Tests Case 2
		$data = [11, 12, 13, 14, 15, 16, 17 ];
		$ma_arr = MovingAverage::simpleMovingAverage(5, $data);
		$this->assertEquals(7, count($ma_arr));
		$this->assertEquals(null, 	$ma_arr[0]);
		$this->assertEquals(null, 	$ma_arr[1]);
		$this->assertEquals(null, 	$ma_arr[2]);
		$this->assertEquals(null, 	$ma_arr[3]);
		$this->assertEquals(13, 	$ma_arr[4]);
		$this->assertEquals(14, 	$ma_arr[5]);
		$this->assertEquals(15, 	$ma_arr[6]);
		
		
		
		// Tests Case 3
		$data = [22.27, 22.19, 22.08, 22.17, 22.18, 22.13, 22.23, 22.43, 22.24, 22.29, 22.15, 22.39, 22.38, 22.61, 23.36, 24.05, 23.75, 23.83, 23.95, 23.63, 23.82, 23.87, 23.65, 23.19, 23.10, 23.33, 22.68, 23.10, 22.40, 22.17];
		$ma_arr = MovingAverage::simpleMovingAverage(10, $data);
		$this->assertEquals(30, count($ma_arr));
		$this->assertEquals(null, 	$ma_arr[0]);
		$this->assertEquals(null, 	$ma_arr[1]);
		$this->assertEquals(null, 	$ma_arr[2]);
		$this->assertEquals(null, 	$ma_arr[3]);
		$this->assertEquals(null, 	$ma_arr[4]);
		$this->assertEquals(null, 	$ma_arr[5]);
		$this->assertEquals(null, 	$ma_arr[6]);
		$this->assertEquals(null, 	$ma_arr[7]);
		$this->assertEquals(null, 	$ma_arr[8]);
		$this->assertEquals(22.22, 	$ma_arr[9], '' , 0.01);
		$this->assertEquals(22.21, 	$ma_arr[10], '' , 0.01);
		$this->assertEquals(22.23, 	$ma_arr[11], '' , 0.01);
		$this->assertEquals(22.26, 	$ma_arr[12], '' , 0.01);
		$this->assertEquals(22.31, 	$ma_arr[13], '' , 0.01);
		$this->assertEquals(22.42, 	$ma_arr[14], '' , 0.01);
		$this->assertEquals(22.61, 	$ma_arr[15], '' , 0.01);
		$this->assertEquals(22.77, 	$ma_arr[16], '' , 0.01);
		$this->assertEquals(22.91, 	$ma_arr[17], '' , 0.01);
		$this->assertEquals(23.08, 	$ma_arr[18], '' , 0.01);
		$this->assertEquals(23.21, 	$ma_arr[19], '' , 0.01);
		$this->assertEquals(23.38, 	$ma_arr[20], '' , 0.01);
		$this->assertEquals(23.53, 	$ma_arr[21], '' , 0.01);
		$this->assertEquals(23.65, 	$ma_arr[22], '' , 0.01);
		$this->assertEquals(23.71, 	$ma_arr[23], '' , 0.01);
		$this->assertEquals(23.69, 	$ma_arr[24], '' , 0.01);
		$this->assertEquals(23.61, 	$ma_arr[25], '' , 0.01);
		$this->assertEquals(23.51, 	$ma_arr[26], '' , 0.01);
		$this->assertEquals(23.43, 	$ma_arr[27], '' , 0.01);
		$this->assertEquals(23.28, 	$ma_arr[28], '' , 0.01);
		$this->assertEquals(23.13, 	$ma_arr[29], '' , 0.01);
		
		
		
		// Tests Case 4
		$data = [20, 22, 24, 25, 23, 26, 28, 26, 29, 27, 28, 30, 27, 29, 28];
		$ma_arr = MovingAverage::simpleMovingAverage(15, $data);
		$this->assertEquals(15, count($ma_arr));
		$this->assertEquals(null, 	$ma_arr[0]);
		$this->assertEquals(null, 	$ma_arr[1]);
		$this->assertEquals(null, 	$ma_arr[2]);
		$this->assertEquals(null, 	$ma_arr[3]);
		$this->assertEquals(null, 	$ma_arr[4]);
		$this->assertEquals(null, 	$ma_arr[5]);
		$this->assertEquals(null, 	$ma_arr[6]);
		$this->assertEquals(null, 	$ma_arr[7]);
		$this->assertEquals(null, 	$ma_arr[8]);
		$this->assertEquals(null, 	$ma_arr[9]);
		$this->assertEquals(null, 	$ma_arr[10]);
		$this->assertEquals(null, 	$ma_arr[11]);
		$this->assertEquals(null, 	$ma_arr[12]);
		$this->assertEquals(null, 	$ma_arr[13]);
		$this->assertEquals(26.13, 	$ma_arr[14], '' , 0.01);
		
		
		
		// Tests Case 5
		$data = [20, 22, 24, 25, 23, 26, 28, 26, 29, 27, 28, 30, 27, 29, 28];
		$ma_arr = MovingAverage::simpleMovingAverage(20, $data);
		$this->assertEquals(15, count($ma_arr));
		$this->assertEquals(null, 	$ma_arr[0]);
		$this->assertEquals(null, 	$ma_arr[1]);
		$this->assertEquals(null, 	$ma_arr[2]);
		$this->assertEquals(null, 	$ma_arr[3]);
		$this->assertEquals(null, 	$ma_arr[4]);
		$this->assertEquals(null, 	$ma_arr[5]);
		$this->assertEquals(null, 	$ma_arr[6]);
		$this->assertEquals(null, 	$ma_arr[7]);
		$this->assertEquals(null, 	$ma_arr[8]);
		$this->assertEquals(null, 	$ma_arr[9]);
		$this->assertEquals(null, 	$ma_arr[10]);
		$this->assertEquals(null, 	$ma_arr[11]);
		$this->assertEquals(null, 	$ma_arr[12]);
		$this->assertEquals(null, 	$ma_arr[13]);
		$this->assertEquals(26.13, 	$ma_arr[14], '' , 0.01);
	}

	
	/**
	 *  Test the 'MovingAverage : exponentialMovingAverage' method.
	 */
	public function testExponentialMovingAverage()
	{
		// Tests Case 1
		$data = [22.27, 22.19, 22.08, 22.17, 22.18, 22.13, 22.23, 22.43, 22.24, 22.29, 22.15, 22.39, 22.38, 22.61, 23.36, 24.05, 23.75, 23.83, 23.95, 23.63, 23.82, 23.87, 23.65, 23.19, 23.10, 23.33, 22.68, 23.10, 22.40, 22.17];
		$ma_arr = MovingAverage::exponentialMovingAverage(10, $data);
		$this->assertEquals(30, count($ma_arr));
		$this->assertEquals(null, 	$ma_arr[0]);
		$this->assertEquals(null, 	$ma_arr[1]);
		$this->assertEquals(null, 	$ma_arr[2]);
		$this->assertEquals(null, 	$ma_arr[3]);
		$this->assertEquals(null, 	$ma_arr[4]);
		$this->assertEquals(null, 	$ma_arr[5]);
		$this->assertEquals(null, 	$ma_arr[6]);
		$this->assertEquals(null, 	$ma_arr[7]);
		$this->assertEquals(null, 	$ma_arr[8]);
		$this->assertEquals(22.22, 	$ma_arr[9], '' , 0.01);
		$this->assertEquals(22.21, 	$ma_arr[10], '' , 0.01);
		$this->assertEquals(22.24, 	$ma_arr[11], '' , 0.01);
		$this->assertEquals(22.27, 	$ma_arr[12], '' , 0.01);
		$this->assertEquals(22.33, 	$ma_arr[13], '' , 0.01);
		$this->assertEquals(22.52, 	$ma_arr[14], '' , 0.01);
		$this->assertEquals(22.80, 	$ma_arr[15], '' , 0.01);
		$this->assertEquals(22.97, 	$ma_arr[16], '' , 0.01);
		$this->assertEquals(23.13, 	$ma_arr[17], '' , 0.01);
		$this->assertEquals(23.28, 	$ma_arr[18], '' , 0.01);
		$this->assertEquals(23.34, 	$ma_arr[19], '' , 0.01);
		$this->assertEquals(23.43, 	$ma_arr[20], '' , 0.01);
		$this->assertEquals(23.51, 	$ma_arr[21], '' , 0.01);
		$this->assertEquals(23.54, 	$ma_arr[22], '' , 0.01);
		$this->assertEquals(23.47, 	$ma_arr[23], '' , 0.01);
		$this->assertEquals(23.40, 	$ma_arr[24], '' , 0.01);
		$this->assertEquals(23.39, 	$ma_arr[25], '' , 0.01);
		$this->assertEquals(23.26, 	$ma_arr[26], '' , 0.01);
		$this->assertEquals(23.23, 	$ma_arr[27], '' , 0.01);
		$this->assertEquals(23.08, 	$ma_arr[28], '' , 0.01);
		$this->assertEquals(22.92, 	$ma_arr[29], '' , 0.01);
	}

}

?>