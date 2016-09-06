<?php namespace pStats;


/**
 *  This class can be used in order to calculate the absolute, relative and cumulative frequencies of a dataset.
 *  It can be used in either Discrete or Continuous data sets.
 *  All items in the data set have to be numeric.
 *
 *  Absolute   Frequency : the number of occurences of an item in the data set
 *  Relative   Frequency : absolute frequency / total number of items
 *  Cumulative Frequency : the total of a frequency and all frequencies so far - 'running total' of all frequencies
 *  
 *  Discrete Values: 
 *  	A discrete variable consists of separate, indivisible categories. No values can exist between a variable and its neighbour.
 *  Continuous Values : 
 *  	Some variables are not limited to a fixed set of indivisible categories. 
 *  	These variables are called continuous variables, and they are divisible into an infinite number of possible values. 
 *
 *
 *  References:
 *  	1. http://www.statcan.gc.ca/edu/power-pouvoir/ch10/5214862-eng.htm
 *  	2. https://mathway.com/examples/Statistics/Frequency-Distribution/Finding-the-Relative-Frequency?id=1057
 *  	3. http://www.ditutor.com/statistics/relative_cumulative.html
 *  
 *  @author Konstantinos Magarisiotis
 *  @license MIT
 */
class Frequency extends DataValues
{
	/**
	 *  Given a dataset, the method calculates the absolute, relative and
	 *  cumulative frequency of each generated class.
	 *  
	 *  @param array $data
	 */
	public static function frequencyContinuous($data = [])
	{
		// Make sure that the elements are numeric
		array_map("self::isNumeric", $data);
		
		// Count the elements
		$items_count = self::countItems($data);
		
		// Get the number of classes
		$classes_num = self::getNumberOfClasses($items_count);
		
		// Get the bottom and top ranges
		$range_margins = Basic::range($data);
		$range = $range_margins->max - $range_margins->min;
		
		// Calculate the group size
		$group_size = self::calcGroupSize($range, $classes_num);
		
		// Create the classes
		$classes = self::createClasses($range_margins->min, $group_size, $classes_num);
		
		// Calculate the absolute, relative and cumulative frequency of each class
		$classes = self::calcFrequencyContinuous($data, $classes);
		
		// Return the classes
		return $classes;
	}
	
	
	/**
	 *  Given a dataet, the method calculates the absolute, relative
	 *  and cumulative frequency of each item.
	 *  
	 *  @param array $data
	 */
	public static function frequencyDiscrete($data = [])
	{
		// Make sure that the elements are numeric
		array_map("self::isNumeric", $data);
	
		// Calculate the absolute, relative and cumulative frequency of each class
		$classes = self::calcFrequencyDiscrete($data);
	
		// Return the classes
		return $classes;
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 *  Count the unique items in an array.
	 *  @param array $data
	 */
	public static function countItems($data = [])
	{
		return count(array_unique($data));
	}
	
	
	
	/**
	 * Calculate the number of classes, using
	 * Sturge's rule.
	 * 
	 * @param integer $items_num
	 */
	public static function getNumberOfClasses($items_num)
	{
		return round(1 + (3.322 * log($items_num, 10)), 0);
	}
	
	
	
	/**
	 * Calculate each group's size.
	 * 
	 * @param number $range
	 * @param integer $classes_num
	 */
	public static function calcGroupSize($range, $classes_num)
	{
		$width_rem = ($range % $classes_num);
		
		if( $width_rem != 0)
			return ceil($range/$classes_num);
		else 
			return ($range / $classes_num) + 1;
	}
	
	
	
	
	/**
	 *  Creates the classes characteristics (boundaries, frequencies)
	 *  based on the group size, number of classes and the range.
	 * 
	 *  @param number $range_bottom
	 *  @param integer $group_size
	 *  @param integer $classes_num
	 */
	public static function createClasses($range_bottom, $group_size, $classes_num)
	{
		$classes = [];
		$group_bottom = $range_bottom;
		
		for($i=0; $i<$classes_num; $i++){
			$classes[$i] 						= 	new \stdClass();
			$classes[$i]->low 					= 	$group_bottom;
			$classes[$i]->low_boundary 			= 	$group_bottom - 0.5;
			$classes[$i]->top 					= 	$group_bottom + ($group_size-1);
			$classes[$i]->top_boundary 			= 	$group_bottom + $group_size - 0.5;
			$classes[$i]->absolute_frequency 	= 	0;
			$classes[$i]->relative_frequency 	= 	0;
			$classes[$i]->cumulative_frequency 	= 	0;
			
			$group_bottom = $group_bottom + $group_size;
		}
		
		return $classes;
	}
	
	
	
	
	/**
	 *  Calculate the absolute, relative and cumulative frequency
	 *  of a data set.
	 * 
	 *  Steps:
	 *  	1. For each data item, find in which class it belongs and calculate the
	 *  		absolute frequency.
	 *  	2. For each data item, calculate the relative frequency and the cumulative
	 *  		frequency.
	 * 
	 *  @param array $data
	 *  @param array $classes
	 *  @return array
	 */
	public static function calcFrequencyContinuous($data = [], $classes = [])
	{
		$sum_freq = 0;
		
		// Step 1.
		foreach ($data as $item) {
			foreach($classes as $class){
				if ( $class->low_boundary <= $item && $class->top_boundary >= $item ) {
					$class->absolute_frequency += 1;
					$sum_freq += 1;
				}
			}
		}
		
		// Step 2.
		$prev_cumu_freq = 0;
		foreach($classes as $class){
			$class->relative_frequency = $class->absolute_frequency / $sum_freq;
			
			$class->cumulative_frequency = $prev_cumu_freq + $class->relative_frequency;
			$prev_cumu_freq = $class->cumulative_frequency;
		}
		
		return $classes;
	}
	
	
	
	
	/**
	 *  Calculate the absolute, relative and cumulative frequency of
	 *  each item in a data set.
	 *  
	 *  Steps:
	 *  	1. Count the occurence of each item in the data set
	 *  	2. Sort the array in ascending order, based on the keys
	 *  	3. Cacluate the sum of the absolute frequency values
	 *  	4. For each item and for the returned array, calculate the abolute
	 *  		and relative frequency
	 *  	5. For each item and for the returned array, calculate the 
	 *  		cumulative frequency.
	 *  
	 *  @param array $data
	 *  @return array
	 */
	public static function calcFrequencyDiscrete($data = [])
	{
		$classes = [];
		
		// Step 1.
		$freq = array_count_values($data);
		
		// Step 2.
		ksort($freq);
		
		// Step 3.
		$sum_freq = array_sum($freq);
		
		// Step 4.
		foreach($freq as $item => $ab_freq){
			$classes[$item] = new \stdClass();
			$classes[$item]->absolute_frequency = $ab_freq;
			$classes[$item]->relative_frequency = round($ab_freq/$sum_freq, 5);
		}
		
		// Step 5.
		$prev_cumu_freq = 0;
		foreach($classes as $class){
			$class->cumulative_frequency = $prev_cumu_freq + $class->relative_frequency;
			$prev_cumu_freq = $class->cumulative_frequency;
		}
		
		return $classes;
	}
	
	
	
	
}

?>