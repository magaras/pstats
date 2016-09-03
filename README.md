# pStats
[![Build Status](https://travis-ci.org/magaras/pstats.svg?branch=master)](https://travis-ci.org/magaras/pstats)

A PHP library containing a lot of statistical methods, from the most usefull ones (*like mean, variance, etc*) to even some more sophisticated,
like moving average.

I intend to keep updating this library in order for it to be as thorough as possible.


Install with composer `composer require magaras/pstats`.


The library supports the following methods:
------

1. Mean : `BasicStatistics::mean($data);`
2. Median : `BasicStatistics::median($data);` 
3. Mode : `BasicStatistics::mode($data);`
4. Range : `BasicStatistics::range($data);`
5. Percentage Change : `BasicStatistics::percentageChange($value1, $value2);`
6. Percentage Difference : `BasicStatistics::percentageDifference($value1, $value2);`

7. Absolute Error : `ErrorStatistics::absoluteError(0, 0);`
8. Mean Absolute Error : `ErrorStatistics::mae($actuals, $predictions);`
9. Mean Square Error : `ErrorStatistics::mse($actuals, $predictions);`
10. Variance *(population / sample)* : `ErrorStatistics::variance($data, true); / ErrorStatistics::variance($data, false);`
11. Std : `ErrorStatistics::std($data);`

12. Absolute / Relative / Cumulative Frequency for continuous values :
`$classes_f = FrequencyStatistics::frequencyContinuous($data);`
`$classes[$i]->absolute_frequency`
`$classes[$i]->relative_frequency`
`$classes[$i]->cumulative_frequency`

13.Absolute / Relative / Cumulative Frequency for discrete values :
`$classes = FrequencyStatistics::frequencyDiscrete($data);`
`$classes[$i]->absolute_frequency`
`$classes[$i]->relative_frequency`
`$classes[$i]->cumulative_frequency`

14. Simple Moving Average : `MovingAverage::simpleMovingAverage(10, $data);`
15. Exponential Moving Average : `MovingAverage::exponentialMovingAverage(10, $data);`
