<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for Trim filter
 */

/**
 * Class for Trim filter
 */
class TrimFilter implements FilterInterface
{

    function filter ($value)
    {
        return trim($value);
    }

}