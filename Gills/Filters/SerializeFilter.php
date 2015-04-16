<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for serialize filter
 */

/**
 * Class for serialize filter
 */
class SerializeFilter implements FilterInterface
{

    function filter ( $value )
    {
        $var = serialize($value);
        
        if ($var === false) {
            throw new FilterException('Failed to serialize value');
        }
        
        return $var;
    }

}