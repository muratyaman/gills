<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for digits filter
 */

/**
 * Class for digits filter
 */
class DigitsFilter extends MatchFilter
{

    function __construct()
    {
        parent::__construct('/^\d*$/');
    }

    function filter($value)
    {
        try {
            $value = parent::filter($value);
        } catch (FilterException $e) {
            throw new FilterException('Value must contain only digits');
        }
        
        return $value;
    }

}

