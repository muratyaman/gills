<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for array filter
 */

/**
 * Class for array filter
 */
class ArrayFilter implements FilterInterface
{

    public function filter($value)
    {
        if ( ! is_array($value) ) {
            throw new FilterException('Array expected');
        }
        
        return $value;
    }

}
