<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for filter to match a regular expression
 */

/**
 * Class for filter to match a regular expression
 */
class MatchFilter implements FilterInterface
{

    private $_pattern = '/.*/';

    /**
     * Pattern to match
     * @param string $pattern
     */
    function __construct($pattern = '')
    {
        $this->_pattern = $pattern;
    }

    function filter($value)
    {
        $matches = array();
        $result = preg_match($this->_pattern, $value, $matches);
        if (!$result) {
            throw new wud_filterexception(sprintf('Value did not match pattern "%s"', $this->_pattern));
        }
        
        return $value;
    }

}

