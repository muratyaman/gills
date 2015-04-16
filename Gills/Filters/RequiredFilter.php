<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for filter to check required values
 */

/**
 * Class for filter to check required values
 */
class RequiredFilter implements FilterInterface
{
    
    function filter($value = null)
    {
        if ( is_null($value) or (is_scalar($value) && trim($value) === '') ) {
            throw new FilterException('Value required');
        }
        
        return $value;
    }
    

}