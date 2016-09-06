<?php namespace pStats;

/**
 *  Class that contains methods to calculate outliers for data sets.
 *  
 *  @author Konstantinos Magarisiotis
 */
class Outliers extends DataValues
{
	/**
	 *  Calculate the outliers for a dataset using
	 *  'Standard Deviation around the mean'.
	 *  
	 *  Steps:
	 *  	1. Calculate the mean and the std
	 *  	2. Calculate the top and bottom thresholds
	 *  	3. It a value is over the top or under the bottom value, 
	 *  		then it is an outlier.
	 *  
	 *  @param array $data
	 *  @param number $mean_thres
	 */
	public static function outlierAroundMean(array $data, $mean_thres = 2)
	{
		$outliers = [];
		
		// Step 1.
		$mean = Basic::mean($data);
		$std = Error::std($data);
		
		// Step 2.
		$top = $mean + $mean_thres * $std;
		$bottom = $mean - $mean_thres * $std;
		
		// Step 3.
		foreach ($data as $item){
			if($item > $top || $item < $bottom) {
				array_push($outliers, $item);
			}
		}
		
		return $outliers;
	}
	
	
	
	
	/**
	 *  Calculates the outliers for a data set, using the 
	 *  'Deviation around the median'.
	 *  
	 *  Steps:
	 *  	1. Calculate the 'mad' value
	 *  	2. Calculate the upper and lower limits
	 *  	3. Find the outliers
	 *  
	 *  https://docs.oracle.com/cd/E17236_01/epm.1112/cb_statistical/frameset.htm?ch07s02s10s01.html
     *  http://www.spiderfinancial.com/support/documentation/numxl/reference-manual/descriptive-stats/mad
     *  http://www.real-statistics.com/descriptive-statistics/measures-variability/
	 *  
	 *  @param array $data
	 */
	public static function outlierAroundMedian(array $data)
	{
		$outliers = [];
		
		$mad = self::madCalculate($data);
		
		$median = Basic::median($data);
		
		$upper_limit = $median + (2.5 * $mad);
        $lower_limit = $median - (2.5 * $mad);
        
        foreach ($data as $val){
        	if( ($val > $upper_limit) || ($val < $lower_limit) ){
        		array_push($outliers, $val );
        	}
        }
        
        return $outliers;
	}
	
	
	
	/**
	 * Calculates the "Median Absolute Deviation" of an array of data.
	 *
	 * Formula:
	 *      1) Sort the array
	 *      2) Calculate the first median
	 *      3) Create new array that each item will be the item of the initial
	 *          array minus the first median, as absolute values
	 *      4) Calculate the median again
	 *
	 * @param array $array_of_values
	 */
	public static function madCalculate(array $data)
	{
		$new_data = [];
		
		// Step 1.
		sort($data);
		
		// Step 2.
		$first_median = Basic::median($data);
		
		// Step 3.
		foreach($data as $val){
			array_push($new_data, abs($val- $first_median));
		}
		
		// Step 4.
		$mad = Basic::median($new_data);
	
		return $mad * 1.4826;
	}
	
	
}

?>
