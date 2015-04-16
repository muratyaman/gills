<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for string filter
 */

/**
 * Class for string filter
 */
class StringFilter implements FilterInterface
{
    
    function filter ($value)
    {
        $var = filter_var($value, FILTER_SANITIZE_STRING);
        if (false !== $var) {
            return $var;
        }
        
        throw new FilterException('Text expected');
    }
}
