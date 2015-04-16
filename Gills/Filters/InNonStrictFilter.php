<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for IN filter
 */

/**
 * Class for IN filter to make sure value is in the list of values defined - STRICTLY/LITERALLY
 */
class InNonStrictFilter extends InFilter
{
    protected $compare_strict = false;
}