<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for JSON-decode filter
 */

/**
 * Class for JSON-decode filter
 */
class JsonDecodeFilter implements FilterInterface
{

    function filter ( $value )
    {
        $var = json_encode($value);
        
        if ($var === false) {
            throw new FilterException('Failed to convert from JSON');
        }
        
        return $var;
    }

}