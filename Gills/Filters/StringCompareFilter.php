<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for string compare filter
 */

/**
 * Class for string compare filter
 */
class StringCompareFilter implements FilterInterface
{

    /**
     * String to compare with
     * @var string
     */
    private $_target;

    
    /**
     * Constructor
     * @param string $target
     */
    function __construct ($target = '')
    {
        $this->_target = $target;
    }

    function filter($value)
    {
        if (!is_string($value)) {
            throw new FilterException('Text expected');
        }
        
        if (strcmp($value, $this->_target) !== 0) {
            throw new FilterException('Text do not match');
        }
        
        return $value;
    }

}