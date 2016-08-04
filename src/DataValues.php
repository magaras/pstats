<?php namespace pStats;

use Exception;

/**
 *  This class is used in validating the elements in the 
 *  data sets.
 *  
 *  @author Konstantinos Magarisiotis
 *  @license MIT
 */
class DataValues
{
	/**
	 * Checks if a var is numeric.
	 * If not, it throws an exception.
	 *
	 * @param unknown $var
	 * @throws \InvalidArgumentException
	 */
	public static function isNumeric($var)
	{
		if(!is_numeric($var)){
			throw new \InvalidArgumentException('Array elements must be numeric');
		}
	}
	
	
	/**
	 * 
	 * @param array $actuals
	 * @param array $predictions
	 * @throws \InvalidArgumentException
	 */
	public static function errorsElementSize($actuals = [], $predictions = [])
	{
		if( count($actuals) != count($predictions) )
			throw new \InvalidArgumentException("Arrays must be of the same size");
	}
}


?>