<?php namespace pStats;

/**
 *  Class that contains the most basic statistics methods.
 *  
 *  Mean  	: find the average of a dataset
 *  Median 	: find the middle element in a dataset
 *  Mode 	: find the element with the most occurences in a dataset
 *  Range 	: find the range of a dataset
 *  
 *  References
 *  	1. http://www.purplemath.com/modules/meanmode.htm
 *  
 *  @author Konstantinos Magarisiotis
 *  @license MIT
 */
class BasicStatistics extends DataValues
{
	/**
	 *  Returns the mean/average value of an array.
	 *  
	 *  Steps:
	 *  	1. Elements must be numeric
	 *  	2. Calculte the mean
	 *  	3. Return the mean value
	 *  
	 *  @param array $data
	 */
	public static function mean($data = [])
	{
		$mean_value = 0;
		
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		if(count($data) != 0) {
			$mean_value = array_sum($data) / count($data);
		}
		
		// Step 3.
		return $mean_value;
	}
	
	
	
	/**
	 * Returns the 'median' - The middle element in the array.
	 * 
	 * Steps:
	 * 		1. Elements must be numeric
	 * 		2. Sort array
	 * 		3. Count number of elements
	 * 		4. Get the median:
	 * 			4.1. If empty array, return 0.
	 * 			4.2. If even, find the average of the middle pair numbers
	 * 			4.3. If odd, get the middle number
	 * 		5. Return the median value
	 * 
	 * Cases:
	 * 3, 6, 2, 1, 8, 7, 4 
	 * 		-> Odd number of elements
	 * 		-> 1, 2, 3, 4, 6, 7, 8 
	 * 		-> Median is 4
	 * 
	 * 3, 6, 2, 1, 8, 7, 4, 12 
	 * 		-> Even number of elements
	 * 		-> 1, 2, 3, 4, 6, 7, 8, 12 
	 * 		-> Median is (4+6)/2 = 5
	 * 
	 * @param array $data
	 */
	public static function median($data = [])
	{
		$median = 0;
		
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		sort($data);
		
		// Step 3.
		$nums = sizeof($data);
		
		// Step 4.
		if($nums == 0) {
			return 0;
		} else if(fmod($nums, 2) == 0){
			$median = ($data[($nums/2) - 1] + $data[$nums/2])/2;
		} else{
			$median = $data[$nums/2];
		}
		
		// Step 5.
		return $median;
	}

	
	
	/**
	 *  Calculate the 'mode' of a dataset,
	 *  the element that occurs the most.
	 * 
	 *  Steps:
	 *  	1. Elements must be numeric
	 *  	2. Count the occurences of each element
	 *  	3. Sort the array by value and descending order
	 *  	4. Take the element with the most occurences the number of the occurences
	 *  	5. Return the results
	 * 
	 *  @param array $data
	 */
	public static function mode($data = [])
	{
		$mode = new \stdClass();
		
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		$occurences = array_count_values($data);
		
		// Step 3.
		arsort($occurences);
		
		// Step 4.
		$mode->key = key($occurences);
		$mode->value = reset($occurences);
		
		// Step 5.
		return $mode;
	}
	
	
	
	/**
	 *  Finds the range of a dataset.
	 * 
	 *  Steps:
	 * 		1. Elements must be numeric
	 * 		2. Get the number of the elements
	 * 		3. If the number of the elements is 0, return 0
	 * 		4. Get the min and max
	 * 		5. Return the range
	 * 
	 *  @param array $data
	 */
	public static function range($data = [])
	{
		$range = new \stdClass();
		
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		$nums = count($data);
		
		// Step 3.
		if($nums == 0){
			$range["min"] = 0;
			$range["max"] 	 = 0;
		}
		
		// Step 4.
		$range->min = min($data);
		$range->max	 = max($data);
		
		// Step 6.
		return $range;
	}
	
	
	
	
	
	/**
	 *  Calculates the 'Percentage Change' from V1 to V2.
	 *  
	 *  Formula : ((V2 - V1) / |V1|) * 100
	 *  
	 *  References:
	 *  http://www.calculatorsoup.com/calculators/algebra/percent-change-calculator.php
	 * 
	 *  @param unknown $v1
	 *  @param unknown $v2
	 */
	public static function percentageChange($v1, $v2)
	{
		self::isNumeric($v1);
		self::isNumeric($v2);
		
		$percent_change = 0;
	
		// Calculate the dividend and the dividor.
		$top = $v2 - $v1;
		$down = abs($v1);
	
		if($down != 0 && $top != 0){
			$percent_change = ($top / $down)*100;
		}
	
		return round($percent_change, 2);
	}
	
	
	
	/**
	 *  Calculates the 'Percentage Change' between two numbers V1 and V2.
	 *  
	 *  Formula : ( | (V1 - V2) | / ((V1 + V2)/2) ) * 100
	 *  
	 *  References:
	 *  http://www.calculatorsoup.com/calculators/algebra/percent-difference-calculator.php
	 *  
	 *  @param number $v1
	 *  @param number $v2
	 */
	public static function percentageDifference($v1, $v2)
	{
		self::isNumeric($v1);
		self::isNumeric($v2);
		$value = 0;
		
		$top = abs($v1 - $v2);
		$down = ($v1 + $v2) / 2;
	
		if($down != 0) {
			$value = ($top / $down) * 100;
		}
	
		return round($value, 2);
	}
	
	
}


?>