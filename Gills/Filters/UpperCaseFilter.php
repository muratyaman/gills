<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for upper-case string filter
 */

/**
 * Class for upper-case string filter
 */
class UpperCaseFilter implements FilterInterface
{
    
    function filter($value)
    {
        if (! is_string($value)) {
            throw new FilterException('Text expected');
        }
        
        return mb_strtoupper($value);
    }

}