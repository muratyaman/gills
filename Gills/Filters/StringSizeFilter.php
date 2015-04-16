<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for string size filter
 */

/**
 * Class for string size filter
 */
class StringSizeFilter implements FilterInterface
{

    /**
     * Minimum string length, inclusive, default is 0
     * @var int
     */
    protected $min;

    /**
     * Maximum string length, inclusive, default is 999999
     * @var int
     */
    protected $max;
    
    /**
     * Constructor
     * @param int $min
     * @param int $max
     */
    function __construct ($min = 0, $max = 999999)
    {
        $this->min = intval($min);
        $this->max = intval($max);
    }

    function filter($value)
    {
        if (!is_string($value)) {
            throw new FilterException('Text expected');
        }
        
        $size = mb_strlen($value);
        
        if ($size < $this->min) {
            throw new FilterException('Text length cannot be less than ' . $this->min);
        }
        
        if ($size > $this->max) {
            throw new FilterException('Text length cannot be more than ' . $this->max);
        }
        
        return $value;
    }

}