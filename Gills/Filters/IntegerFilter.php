<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for integer filter
 */

/**
 * Class for integer filter
 */
class IntegerFilter implements FilterInterface
{
    
    function filter ($value)
    {
        if (is_null($value) or trim($value) === '') {
            return $value;//use required filter
        }
        
        //$var = filter_var($value, FILTER_VALIDATE_INT);//PHP has disappointed us by saying NO to "01"
        //if ($var !== false) {
        //    if ( strcmp($value, $var) === 0) {
        //        return $value;
        //    }
        //}
        
        if (is_scalar($value)) {//Scalar variables are those containing an integer, float, string or boolean
            $matched = (1 == preg_match('/^[0-9]+$/', $value));
            if ($matched) {
                return $value;
            }
        }
        
        throw new wud_filterexception('Integer expected');
    }
}
