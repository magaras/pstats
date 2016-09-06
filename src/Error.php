<?php namespace pStats;

/**
 *  Class that contains methods to calculate the 
 *   1. Absolute Error
 *   2. Mean Absolute Error
 *   3. Mean Square Error
 * 
 *  @author Konstantinos Magarisiotis
 *  @license MIT
 */
class Error extends DataValues
{
	/**
	 * Calculate the 'Absolute Error' between two numbers,
	 * the actual one and the prediction.
	 * 
	 * @param number $actual
	 * @param number $prediction
	 */
	public static function absoluteError($actual, $prediction)
	{
		return abs($prediction - $actual);
	}
	
	
	
	/**
	 *  Calculates the 'Mean Absolute Error'.
	 *  Each item of both arrays, must point to the same element.
	 *  E.g. X[0] : actual = 0, predicted = 1
	 * 
	 *  @param array $actual		The actual values
	 *  @param array $predictions	The predicted values
	 */
	public static function mae($actuals = [], $predictions = [])
	{
		array_map("self::isNumeric", $actuals);
		array_map("self::isNumeric", $predictions);
		self::errorsElementSize($actuals, $predictions);
		
		$n = count($actuals);
		$sum = 0;
		for($i=0; $i<$n; $i++) {
			$sum += self::absoluteError($actuals[$i], $predictions[$i]);
		}
		
		return round($sum / $n, 3);
	}
	
	
	/**
	 *  Calculates the 'Mean Squared Error'.
	 *  Each item of both arrays, must point to the same element.
	 *  E.g. X[0] : actual = 0, predicted = 1
	 *
	 *  @param array $actual		The actual values
	 *  @param array $predictions	The predicted values
	 */
	public static function mse($actuals = [], $predictions = [])
	{
		array_map("self::isNumeric", $actuals);
		array_map("self::isNumeric", $predictions);
		self::errorsElementSize($actuals, $predictions);
	
		$n = count($actuals);
		$sum = 0;
		for($i=0; $i<$n; $i++) {
			$sum += pow(self::absoluteError($actuals[$i], $predictions[$i]), 2);
		}
		
		return round($sum / $n, 3);
	}
	
	
	
	
	/**
	 *  Calculates the variance for a data set for a pupulation or a sample set.
	 *  Variance is defined as 'The average of the squared differences from the Mean.'.
	 *  
	 *  References:
	 *  http://www.mathsisfun.com/data/standard-deviation.html
	 *  
	 *  Steps:
	 *  	1. Make sure that elements are numeric
	 *  	2. Calculate the mean
	 *  	3. Calculate the variance : the 'Mean Squared Error' between the elements and the mean
	 *  
	 *  @param array $data
	 */
	public static function variance($data = [], $population = true)
	{
		$variance = 0;
		
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		$mean = Basic::mean($data);
		
		// Step 3.
		$n = count($data);
		$sum = 0;
		for($i=0; $i<$n; $i++) {
			$sum += pow(self::absoluteError($data[$i], $mean), 2);
		}
		
		if($population == true) {
			$variance = round($sum / $n, 3);
		}
		else {
			$variance = round($sum / ($n-1), 3);
		}
		
		return $variance;
	}
	
	
	
	/**
	 *  Calculates the 'Standard Deviation' for a data set.
	 *  The Standard Deviation is a measure of how spread out numbers are.
	 *  
	 *  References:
	 *  http://www.mathsisfun.com/data/standard-deviation.html
	 *  
	 *  Steps:
	 *  	1. Make sure that the elements are numeric
	 *  	2. Calculate the variance
	 *  	3. Calculate the 'Standard Deviation'
	 *  	4. Return the value
	 *  
	 *  @param array $data
	 */
	public static function std($data = [])
	{
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		$variance = self::variance($data);
		
		// Step 3.
		$std = sqrt($variance);
		
		// Step 4.
		return round($std, 3);
	}
	
	
}

?>