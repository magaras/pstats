# pStats
[![Build Status](https://travis-ci.org/magaras/pstats.svg?branch=master)](https://travis-ci.org/magaras/pstats)


A PHP library containing a lot of statistical methods, from the most usefull ones (*like mean and variance*) to even some more sophisticated,
like moving average and outliers around median.


I intend to keep updating this library in order for it to be as thorough as possible.


Install with composer `composer require magaras/pstats`.


The library supports the following methods:
======


**Mean**
```php
Basic::mean($data);
```

** Median**
```php
Basic::median($data);
```

**Mode**
```php
Basic::mode($data);
```

**Range**
```php
Basic::range($data);
```

**Percentage Change**
```php
Basic::percentageChange($start_value, $end_value);
```

**Percentage Difference**
```php
Basic::percentageDifference($start_value, $end_value);
```

**Absolute Error**
```php
Error::absoluteError(0, 0);
```

**Mean Absolute Error**
```php
Error::mae($actuals, $predictions);
```

**Mean Square Error**
```php
Error::mse($actuals, $predictions);
```

**Variance *(population / sample)***
```php
Error::variance($data, true);
Error::variance($data, false);
```

**Std**
```php
Error::std($data);
```

**Absolute / Relative / Cumulative Frequency for continuous values**
```php
$frequency_classes = Frequency::frequencyContinuous($data);

$frequency_classes[$i]->absolute_frequency

$frequency_classes[$i]->relative_frequency

$frequency_classes[$i]->cumulative_frequency
```

**Absolute / Relative / Cumulative Frequency for discrete values**
```php
$frequency_classes = Frequency::frequencyDiscrete($data);

$frequency_classes[$i]->absolute_frequency

$frequency_classes[$i]->relative_frequency

$frequency_classes[$i]->cumulative_frequency
```

**Simple Moving Average**
```php
MovingAverage::simpleMovingAverage($moving_average_value, $data);
```

**Exponential Moving Average**
```php
MovingAverage::exponentialMovingAverage(moving_average_value, $data);
```

**Outliers Around Mean**
```php
Outliers::outlierAroundMean($data);
```

**Outliers Around Median**
```php
Outliers::outlierAroundMedian($data);
```
