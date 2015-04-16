<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for number range filter
 */

/**
 * Class for number range filter
 */
class NumberRangeFilter implements FilterInterface
{

    /**
     * Minimum number value, inclusive, default is 0
     * @var int
     */
    protected $min;

    /**
     * Maximum number value, inclusive, default is 2^31 = 2147483648
     * @var int
     */
    protected $max;

    /**
     * Constructor
     * @param int $min defaults to 0
     * @param int $max defaults to 2^31 = 2147483648
     */
    function __construct($min = 0, $max = 2147483648)
    {
        $this->min = floatval($min);
        $this->max = floatval($max);
    }

    function filter($value)
    {
        $val = floatval($value);
        
        if ($val < $this->min) {
            throw new FilterException('Number cannot be less than ' . $this->min);
        }
        
        if ($val > $this->max) {
            throw new FilterException('Number cannot be more than ' . $this->max);
        }
        
        return $value;
    }

}