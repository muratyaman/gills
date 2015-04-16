<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for float filter
 */

/**
 * Class for float filter
 */
class FloatFilter implements FilterInterface
{
    
    
    public function filter($value)
    {
        if (is_null($value) or trim($value) === '') {
            return $value;//use required filter
        }
        
        $var = filter_var($value, FILTER_VALIDATE_FLOAT);
        if ($var === false) {
            throw new FilterException('Numeric expression expected');
        }
        
        return $var;
    }

}
