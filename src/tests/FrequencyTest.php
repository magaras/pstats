<?php

use PHPUnit\Framework\TestCase;
use pStats\Frequency;

/**
 *  This class contains tests for the 'Frequency' class.
 *  
 *  @author Konstantinos Magarisiotis
 */
class FrequencyTest extends TestCase
{
	/**
	 *  Tests the 'Frequency::countItems' method.
	 */
	public function testCountItems()
	{
		// Test Case 1
		$data = [1, 3, 2, 4, 5, 2, 4, 8, 7, 9];
		$items = Frequency::countItems($data);
		$this->assertEquals(8, $items);
		
		// Test Case 2
		$data = [1, 3, 87, 34, 5, 2, 4, 8, 7, 9];
		$items = Frequency::countItems($data);
		$this->assertEquals(10, $items);
		
		// Test Case 3
		$data = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
		$items = Frequency::countItems($data);
		$this->assertEquals(1, $items);
		
		// Test Case 4
		$data = [5, 6, 3, 3, 2, 4, 7, 5, 2, 3, 5, 6, 5, 4, 4, 3, 5, 2, 5, 3];
		$items = Frequency::countItems($data);
		$this->assertEquals(6, $items);
	}
	
	
	
	/**
	 *  Tests the 'Frequency::getNumberOfClasses' method.
	 */
	public function testGetNumberOfClasses()
	{
		$num = Frequency::getNumberOfClasses(8);
		$this->assertEquals(4, $num);
		
		$num = Frequency::getNumberOfClasses(21);
		$this->assertEquals(5, $num);
		
		$num = Frequency::getNumberOfClasses(6);
		$this->assertEquals(4, $num);
	}
	
	
	
	/**
	 *  Tests the 'Frequency::calcGroupSize' method.
	 */
	public function testCalcGroupSize()
	{
		// Test Case 1
		$size = Frequency::calcGroupSize(9, 4);
		$this->assertEquals(3, $size);
		
		// Test Case 2
		$size = Frequency::calcGroupSize(15, 4);
		$this->assertEquals(4, $size);
		
		// Test Case 3
		$size = Frequency::calcGroupSize(21, 5);
		$this->assertEquals(5, $size);
		
		$size = Frequency::calcGroupSize(8, 4);
		$this->assertEquals(3, $size);
	}
	
	
	
	/**
	 *  Tests the 'Frequency::createClasses' method.
	 *  @group testCreateClasses
	 */
	public function testCreateClasses()
	{
		// *** Test Case 1
		$data = [9,8,7,1,0,3,8,9];
		$classes = Frequency::createClasses(0, 3, 4);
		   // Class N.1
		$this->assertEquals(0,    $classes[0]->low);
		$this->assertEquals(-0.5, $classes[0]->low_boundary);
		$this->assertEquals(2,    $classes[0]->top);
		$this->assertEquals(2.5,  $classes[0]->top_boundary);
		$this->assertEquals(0,    $classes[0]->absolute_frequency);
		$this->assertEquals(0,    $classes[0]->relative_frequency);
		$this->assertEquals(0,    $classes[0]->cumulative_frequency);
		
		   // Class N.2
		$this->assertEquals(3,    $classes[1]->low);
		$this->assertEquals(2.5,  $classes[1]->low_boundary);
		$this->assertEquals(5,    $classes[1]->top);
		$this->assertEquals(5.5,  $classes[1]->top_boundary);
		$this->assertEquals(0,    $classes[1]->absolute_frequency);
		$this->assertEquals(0,    $classes[1]->relative_frequency);
		$this->assertEquals(0,    $classes[1]->cumulative_frequency);
		
		   // Class N.3
		$this->assertEquals(6,    $classes[2]->low);
		$this->assertEquals(5.5,  $classes[2]->low_boundary);
		$this->assertEquals(8,    $classes[2]->top);
		$this->assertEquals(8.5,  $classes[2]->top_boundary);
		$this->assertEquals(0,    $classes[2]->absolute_frequency);
		$this->assertEquals(0,    $classes[2]->relative_frequency);
		$this->assertEquals(0,    $classes[2]->cumulative_frequency);
		
		   // Class N.4
		$this->assertEquals(9,    $classes[3]->low);
		$this->assertEquals(8.5,  $classes[3]->low_boundary);
		$this->assertEquals(11,   $classes[3]->top);
		$this->assertEquals(11.5, $classes[3]->top_boundary);
		$this->assertEquals(0,    $classes[3]->absolute_frequency);
		$this->assertEquals(0,    $classes[3]->relative_frequency);
		$this->assertEquals(0,    $classes[3]->cumulative_frequency);
		
		
		
		
		
		
		// *** Test Case 2
		$data = [0,8,7,8,6,4,2,1,3,2];
		$classes = Frequency::createClasses(0, 3, 4);
		    // Class N.1
		$this->assertEquals(0,    $classes[0]->low);
		$this->assertEquals(-0.5, $classes[0]->low_boundary);
		$this->assertEquals(2,    $classes[0]->top);
		$this->assertEquals(2.5,  $classes[0]->top_boundary);
		$this->assertEquals(0,    $classes[0]->absolute_frequency);
		$this->assertEquals(0,    $classes[0]->relative_frequency);
		$this->assertEquals(0,    $classes[0]->cumulative_frequency);
		
		    // Class N.2
		$this->assertEquals(3,    $classes[1]->low);
		$this->assertEquals(2.5,  $classes[1]->low_boundary);
		$this->assertEquals(5,    $classes[1]->top);
		$this->assertEquals(5.5,  $classes[1]->top_boundary);
		$this->assertEquals(0,    $classes[1]->absolute_frequency);
		$this->assertEquals(0,    $classes[1]->relative_frequency);
		$this->assertEquals(0,    $classes[1]->cumulative_frequency);
		
		    // Class N.3
		$this->assertEquals(6,    $classes[2]->low);
		$this->assertEquals(5.5,  $classes[2]->low_boundary);
		$this->assertEquals(8,    $classes[2]->top);
		$this->assertEquals(8.5,  $classes[2]->top_boundary);
		$this->assertEquals(0,    $classes[2]->absolute_frequency);
		$this->assertEquals(0,    $classes[2]->relative_frequency);
		$this->assertEquals(0,    $classes[2]->cumulative_frequency);
		
		    // Class N.4
		$this->assertEquals(9,    $classes[3]->low);
		$this->assertEquals(8.5,  $classes[3]->low_boundary);
		$this->assertEquals(11,   $classes[3]->top);
		$this->assertEquals(11.5, $classes[3]->top_boundary);
		$this->assertEquals(0,    $classes[3]->absolute_frequency);
		$this->assertEquals(0,    $classes[3]->relative_frequency);
		$this->assertEquals(0,    $classes[3]->cumulative_frequency);
	}
	
	
	
	/**
	 *  Tests the 'Frequency::calcFrequencyContinuous' method.
	 */
	public function testCalcFrequencyContinuous()
	{
		// *** Test Case 1
		$data = [9,8,7,1,0,3,8,9];
		$classes = Frequency::createClasses(0, 3, 4);
		$classes_f = Frequency::calcFrequencyContinuous($data, $classes);
		$this->assertEquals(2,     $classes_f[0]->absolute_frequency);
		$this->assertEquals(0.25,  $classes_f[0]->relative_frequency);
		$this->assertEquals(0.25,  $classes_f[0]->cumulative_frequency);
		
		$this->assertEquals(1,     $classes_f[1]->absolute_frequency);
		$this->assertEquals(0.125, $classes_f[1]->relative_frequency);
		$this->assertEquals(0.375, $classes_f[1]->cumulative_frequency);
		
		$this->assertEquals(3,     $classes_f[2]->absolute_frequency);
		$this->assertEquals(0.375, $classes_f[2]->relative_frequency);
		$this->assertEquals(0.750, $classes_f[2]->cumulative_frequency);
		
		$this->assertEquals(2,     $classes_f[3]->absolute_frequency);
		$this->assertEquals(0.250, $classes_f[3]->relative_frequency);
		$this->assertEquals(1,     $classes_f[3]->cumulative_frequency);
		
		
		
		// *** Test Case 2
		$data = [0,8,7,8,6,4,2,1,3,2];
		$classes = Frequency::createClasses(0, 3, 4);
		$classes_f = Frequency::calcFrequencyContinuous($data, $classes);
		
		$this->assertEquals(4,     $classes_f[0]->absolute_frequency);
		$this->assertEquals(0.4,   $classes_f[0]->relative_frequency);
		$this->assertEquals(0.4,   $classes_f[0]->cumulative_frequency);
		
		$this->assertEquals(2,     $classes_f[1]->absolute_frequency);
		$this->assertEquals(0.2,   $classes_f[1]->relative_frequency);
		$this->assertEquals(0.6,   $classes_f[1]->cumulative_frequency);
		
		$this->assertEquals(4,     $classes_f[2]->absolute_frequency);
		$this->assertEquals(0.4,   $classes_f[2]->relative_frequency);
		$this->assertEquals(1,     $classes_f[2]->cumulative_frequency);
		
		$this->assertEquals(0,     $classes_f[3]->absolute_frequency);
		$this->assertEquals(0,     $classes_f[3]->relative_frequency);
		$this->assertEquals(1,     $classes_f[3]->cumulative_frequency);
	}
	
	
	
	/**
	 *  Tests the 'Frequency::calcFrequencyDiscrete' method.
	 */
	public function testCalcFrequencyDiscrete()
	{
		$data = [32, 31, 28, 29, 33, 32, 31, 30, 31, 31, 27, 28, 29, 30, 32, 31, 31, 30, 30, 29, 29, 30, 30, 31, 30, 31, 34, 33, 33, 29, 29];
		$classes = Frequency::calcFrequencyDiscrete($data);
		$this->assertEquals(1, 			$classes[27]->absolute_frequency);
		$this->assertEquals(0.03226, 	$classes[27]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.03226, 	$classes[27]->cumulative_frequency, 	'', 0.001);
		
		$this->assertEquals(2, 			$classes[28]->absolute_frequency);
		$this->assertEquals(0.06452, 	$classes[28]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.09678, 	$classes[28]->cumulative_frequency,		'', 0.001);
		
		$this->assertEquals(6, 			$classes[29]->absolute_frequency);
		$this->assertEquals(0.19355, 	$classes[29]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.29033, 	$classes[29]->cumulative_frequency, 	'', 0.001);
		
		$this->assertEquals(7, 			$classes[30]->absolute_frequency);
		$this->assertEquals(0.2258, 	$classes[30]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.51613, 	$classes[30]->cumulative_frequency, 	'', 0.001);
		
		$this->assertEquals(8, 			$classes[31]->absolute_frequency);
		$this->assertEquals(0.258, 		$classes[31]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.77413, 	$classes[31]->cumulative_frequency, 	'', 0.001);
		
		$this->assertEquals(8, 			$classes[31]->absolute_frequency);
		$this->assertEquals(0.258, 		$classes[31]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.77413, 	$classes[31]->cumulative_frequency, 	'', 0.001);
		
		$this->assertEquals(3, 			$classes[32]->absolute_frequency);
		$this->assertEquals(0.09667, 	$classes[32]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.8708, 	$classes[32]->cumulative_frequency, 	'', 0.001);
		
		$this->assertEquals(3, 			$classes[33]->absolute_frequency);
		$this->assertEquals(0.09667, 	$classes[33]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.96747, 	$classes[33]->cumulative_frequency, 	'', 0.001);
		
		$this->assertEquals(1, 			$classes[34]->absolute_frequency);
		$this->assertEquals(0.03226, 	$classes[34]->relative_frequency,		'', 0.001);
		$this->assertEquals(1, 			$classes[34]->cumulative_frequency, 	'', 0.001);
	}
	
	
	
	
	
	
	

	/**
	 *  Tests the 'Frequency::frequencyContinuous' method.
	 */
	public function testFrequencyContinuous()
	{
		// *** Test Case 1
		$data = [9,8,7,1,0,3,8,9];
		$classes_f = Frequency::frequencyContinuous($data);
		
		$this->assertEquals(0,     $classes_f[0]->low);
		$this->assertEquals(-0.5,  $classes_f[0]->low_boundary);
		$this->assertEquals(2,     $classes_f[0]->top);
		$this->assertEquals(2.5,   $classes_f[0]->top_boundary);
		$this->assertEquals(2,     $classes_f[0]->absolute_frequency);
		$this->assertEquals(0.25,  $classes_f[0]->relative_frequency);
		$this->assertEquals(0.25,  $classes_f[0]->cumulative_frequency);
	
		$this->assertEquals(3,     $classes_f[1]->low);
		$this->assertEquals(2.5,   $classes_f[1]->low_boundary);
		$this->assertEquals(5,     $classes_f[1]->top);
		$this->assertEquals(5.5,   $classes_f[1]->top_boundary);
		$this->assertEquals(1,     $classes_f[1]->absolute_frequency);
		$this->assertEquals(0.125, $classes_f[1]->relative_frequency);
		$this->assertEquals(0.375, $classes_f[1]->cumulative_frequency);
	
		$this->assertEquals(6,     $classes_f[2]->low);
		$this->assertEquals(5.5,   $classes_f[2]->low_boundary);
		$this->assertEquals(8,     $classes_f[2]->top);
		$this->assertEquals(8.5,   $classes_f[2]->top_boundary);
		$this->assertEquals(3,     $classes_f[2]->absolute_frequency);
		$this->assertEquals(0.375, $classes_f[2]->relative_frequency);
		$this->assertEquals(0.750, $classes_f[2]->cumulative_frequency);
	
		$this->assertEquals(9,     $classes_f[3]->low);
		$this->assertEquals(8.5,   $classes_f[3]->low_boundary);
		$this->assertEquals(11,    $classes_f[3]->top);
		$this->assertEquals(11.5,  $classes_f[3]->top_boundary);
		$this->assertEquals(2,     $classes_f[3]->absolute_frequency);
		$this->assertEquals(0.250, $classes_f[3]->relative_frequency);
		$this->assertEquals(1,     $classes_f[3]->cumulative_frequency);
	
	
	
		// *** Test Case 2
		$data = [0,8,7,8,6,4,2,1,3,2];
		$classes_f = Frequency::frequencyContinuous($data);
	
		$this->assertEquals(0,     $classes_f[0]->low);
		$this->assertEquals(-0.5,  $classes_f[0]->low_boundary);
		$this->assertEquals(2,     $classes_f[0]->top);
		$this->assertEquals(2.5,   $classes_f[0]->top_boundary);
		$this->assertEquals(4,     $classes_f[0]->absolute_frequency);
		$this->assertEquals(0.4,   $classes_f[0]->relative_frequency);
		$this->assertEquals(0.4,   $classes_f[0]->cumulative_frequency);
	
		$this->assertEquals(3,     $classes_f[1]->low);
		$this->assertEquals(2.5,   $classes_f[1]->low_boundary);
		$this->assertEquals(5,     $classes_f[1]->top);
		$this->assertEquals(5.5,   $classes_f[1]->top_boundary);
		$this->assertEquals(2,     $classes_f[1]->absolute_frequency);
		$this->assertEquals(0.2,   $classes_f[1]->relative_frequency);
		$this->assertEquals(0.6,   $classes_f[1]->cumulative_frequency);
	
		$this->assertEquals(6,     $classes_f[2]->low);
		$this->assertEquals(5.5,   $classes_f[2]->low_boundary);
		$this->assertEquals(8,     $classes_f[2]->top);
		$this->assertEquals(8.5,   $classes_f[2]->top_boundary);
		$this->assertEquals(4,     $classes_f[2]->absolute_frequency);
		$this->assertEquals(0.4,   $classes_f[2]->relative_frequency);
		$this->assertEquals(1,     $classes_f[2]->cumulative_frequency);
	
		$this->assertEquals(9,     $classes_f[3]->low);
		$this->assertEquals(8.5,   $classes_f[3]->low_boundary);
		$this->assertEquals(11,    $classes_f[3]->top);
		$this->assertEquals(11.5,  $classes_f[3]->top_boundary);
		$this->assertEquals(0,     $classes_f[3]->absolute_frequency);
		$this->assertEquals(0,     $classes_f[3]->relative_frequency);
		$this->assertEquals(1,     $classes_f[3]->cumulative_frequency);
	}
	
	
	
	
	/**
	 *  Tests the 'Frequency::frequencyAbsolutes' method.
	 */
	public function testFrequencyDiscrete()
	{
		$data = [32, 31, 28, 29, 33, 32, 31, 30, 31, 31, 27, 28, 29, 30, 32, 31, 31, 30, 30, 29, 29, 30, 30, 31, 30, 31, 34, 33, 33, 29, 29];
		$classes = Frequency::frequencyDiscrete($data);
		$this->assertEquals(1, 			$classes[27]->absolute_frequency);
		$this->assertEquals(0.03226, 	$classes[27]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.03226, 	$classes[27]->cumulative_frequency, 	'', 0.001);
	
		$this->assertEquals(2, 			$classes[28]->absolute_frequency);
		$this->assertEquals(0.06452, 	$classes[28]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.09678, 	$classes[28]->cumulative_frequency,		'', 0.001);
	
		$this->assertEquals(6, 			$classes[29]->absolute_frequency);
		$this->assertEquals(0.19355, 	$classes[29]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.29033, 	$classes[29]->cumulative_frequency, 	'', 0.001);
	
		$this->assertEquals(7, 			$classes[30]->absolute_frequency);
		$this->assertEquals(0.2258, 	$classes[30]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.51613, 	$classes[30]->cumulative_frequency, 	'', 0.001);
	
		$this->assertEquals(8, 			$classes[31]->absolute_frequency);
		$this->assertEquals(0.258, 		$classes[31]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.77413, 	$classes[31]->cumulative_frequency, 	'', 0.001);
	
		$this->assertEquals(8, 			$classes[31]->absolute_frequency);
		$this->assertEquals(0.258, 		$classes[31]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.77413, 	$classes[31]->cumulative_frequency, 	'', 0.001);
	
		$this->assertEquals(3, 			$classes[32]->absolute_frequency);
		$this->assertEquals(0.09667, 	$classes[32]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.8708, 	$classes[32]->cumulative_frequency, 	'', 0.001);
	
		$this->assertEquals(3, 			$classes[33]->absolute_frequency);
		$this->assertEquals(0.09667, 	$classes[33]->relative_frequency,		'', 0.001);
		$this->assertEquals(0.96747, 	$classes[33]->cumulative_frequency, 	'', 0.001);
	
		$this->assertEquals(1, 			$classes[34]->absolute_frequency);
		$this->assertEquals(0.03226, 	$classes[34]->relative_frequency,		'', 0.001);
		$this->assertEquals(1, 			$classes[34]->cumulative_frequency, 	'', 0.001);
	}
	
	
	
	
}

?>