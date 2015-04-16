<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for filter to match multiple regular expressions
 */

/**
 * Class for filter to match multiple regular expressions
 */
class MatchMultiFilter implements FilterInterface
{

    private $_patterns = array('/.*/');

    /**
     * CSV of patterns to match
     * @param array $patterns
     */
    function __construct($patterns = '')
    {
        if (! empty($patterns)) {
            $this->_patterns = str_getcsv($patterns);
        }
    }

    function filter ($value)
    {
        foreach ($this->_patterns as $pattern) {
            $matches = array();
            $result = preg_match($pattern, $value, $matches);
            if (!$result) {
                throw new FilterException(sprintf('Value did not match pattern "%s"', $pattern));
            }
        }
        
        return $value;
    }

}

