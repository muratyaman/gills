<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for unserialize filter
 */

/**
 * Class for unserialize filter
 */
class UnserializeFilter implements FilterInterface
{

    function filter ( $value )
    {
        $var = unserialize($value);
        
        if ($var === false) {
            throw new FilterException('Failed to unserialize value');
        }
        
        return $var;
    }

}