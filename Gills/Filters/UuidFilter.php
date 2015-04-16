<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for UUID filter
 */

/**
 * Class for UUID filter
 */
class UuidFilter extends MatchFilter
{
    
    function __construct ( $patterns = '' )
    {
        $patterns = '/^([a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12})$/';
        parent::__construct ($patterns);
    }
    
    function filter($value)
    {
        try {
            $var = parent::filter($value);
        } catch (wud_filterexception $ex) {
            throw new wud_filterexception('UUID string expected');
        }
        
        return $var;
    }

}