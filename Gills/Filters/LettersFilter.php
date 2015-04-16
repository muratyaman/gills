<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for letters filter
 */

/**
 * Class for letters filter
 */
class LettersFilter extends MatchFilter
{

    function __construct()
    {
        parent::__construct('/^[A-Za-z]*$/');
    }

    function filter ($value)
    {
        try {
            $value = parent::filter($value);
        } catch (wud_filterexception $e) {
            throw new wud_filterexception('Value must contain only letters (upper-case or lower-case)');
        }
        
        return $value;
    }

}

