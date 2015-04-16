<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for JSON-encode filter
 */

/**
 * Class for JSON-encode filter
 */
class JsonEncodeFilter implements FilterInterface
{

    function filter ( $value )
    {
        $var = json_encode($value);
        
        if ($var === false) {
            throw new FilterException('Failed to convert to JSON');
        }
        
        return $var;
    }

}