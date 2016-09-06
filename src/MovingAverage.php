<?php namespace pStats;

/**
 * In statistics, a moving average (rolling average or running average) is a calculation to analyze 
 * data points by creating series of averages of different subsets of the full data set. 
 * It is also called a moving mean (MM) or rolling mean and is a type of finite impulse response filter.
 * 
 * A moving average (MA) is a trend-following or lagging indicator because it is based on past prices. 
 * The two basic and commonly used MAs are the simple moving average (SMA), 
 * which is the simple average of a security over a defined number of time periods, 
 * and the exponential moving average (EMA), which gives bigger weight to more recent prices.
 * 
 * References:
 * https://en.wikipedia.org/wiki/Moving_average
 * http://www.investopedia.com/terms/m/movingaverage.asp
 * http://stockcharts.com/school/doku.php?id=chart_school:technical_indicators:moving_averages
 * 
 * @author Konstantinos Magarisiotis
 * @license MIT
 */
class MovingAverage extends DataValues
{
	
	
	/**
	 *  Calculates the 'Simple Moving Average' for a data set.
	 *  
	 *  Steps:
	 *  	1. Make sure elements are numeric
	 *  	2. 'Moving Average Value' can't be greater than the size of the elements.
	 *  		In such case set the value to the size of the elements.
	 *  	3. Calculate the number of the Moving Average calculated elements.
	 *  	4. Initiate the array to be returned with null values.
	 *  	5. Calculate the Moving Average values:
	 *  		1. Calculate new array with the needed elements, based on the given 'Moving Average Value'
	 *  		2. Calculate the mean
	 *  		3. Add it to the array
	 *  
	 *  @param number 	$ma_value		Moving Average Value
	 *  @param array 	$data			Data Set
	 */
	public static function simpleMovingAverage($ma_value, $data = [])
	{
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		$ma_value = self::fixMaValue(count($data), $ma_value);
		
		// Step 3.
		$ma_calc_items = (count($data) - $ma_value) + 1;
		
		// Step 4.
		$ma_arr = array_pad([], count($data), null);
		
		// Step 5.
		for($i=0; $i<$ma_calc_items; $i++){
			// Step 5.1.
			$arr = array_slice($data, $i, $ma_value);
			
			// Step 5.2.
			$mean = Basic::mean($arr);
			
			// Step 5.3
			$ma_arr[$i + $ma_value-1] = $mean;
		}
		
		return $ma_arr;
	}
	
	
	
	
	
	/**
	 *  Calculates the 'Exponential Moving Average' for a data set.
	 *  
	 *  Steps:
	 *  	1. Make sure that the array elements are numeric.
	 *  	2. Fix the 'Moving Average' value if needed.
	 *  	3. Calculate the 'Simple Moving Average' for the data set.
	 *  	4. Calculate the 'Smooth Constant'.
	 *  	5. Set the initial 'Exponential Moving Average' value.
	 *  	6. Calculate the remaining values
	 *  	
	 *  
	 *  @param number 	$ma_value		Moving Average Value
	 *  @param array 	$data			Data Set
	 */
	public static function exponentialMovingAverage($ma_value, $data = [])
	{
		// Step 1.
		array_map("self::isNumeric", $data);
		
		// Step 2.
		$ma_value = self::fixMaValue(count($data), $ma_value);
		
		// Step 3.
		$ema = array_pad([], count($data), null);
		
		// Step 4.
		$sma = self::simpleMovingAverage($ma_value, $data);
		
		// Step 5.
		$constant_val = 2 / ($ma_value + 1);
		
		// Step 6.
		$ema[$ma_value - 1] = $sma[$ma_value - 1];
		
		// Step 7.
		for($i=$ma_value; $i<count($data); $i++){
			$ema[$i] = round($constant_val * ($data[$i] - $ema[$i-1]) + $ema[$i-1], 3);
		}
		
		return $ema;
	}
	
	
	
	
	/**
	 *  In case that the wanted 'Moving Average Value' is bigger
	 *  than the size of the data set, then the value is
	 *  automatically set to the that size.
	 *
	 *  @param number $count_of_data	Size of Data Set
	 *  @param number $ma_value			Moving Average Value
	 */
	public static function fixMaValue($count_of_data, $ma_value)
	{
		if($ma_value > $count_of_data)
			$ma_value = $count_of_data;
	
			return $ma_value;
	}
	
	
}


?>