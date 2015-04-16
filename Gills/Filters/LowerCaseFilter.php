<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for lower-case string filter
 */

/**
 * Class for lower-case string filter
 */
class LowerCaseFilter implements FilterInterface
{

    function filter ($value)
    {
        if (!is_string($value)) {
            throw new FilterException('Text expected');
        }
        
        return mb_strtolower($value);
    }

}