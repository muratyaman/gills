<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for nil-to-null filter
 */

/**
 * Class for nil-to-null filter
 */
class NilToNullFilter implements FilterInterface
{

    function filter ($value)
    {
        return trim($value) === '' ? null : $value;
    }

}