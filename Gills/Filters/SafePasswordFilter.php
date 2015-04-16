<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for safe password filter
 */

/**
 * Class for safe password filter
 */
class SafePasswordFilter extends MatchMultiFilter
{
    
    /**
     * Constructor
     * @param string $patterns CSV of required valid patterns
     */
    function __construct($patterns = '')
    {
        if ($patterns == '') {
            $patterns = '"/[a-z]/","/[A-Z]/","/[0-9]/","/(.*){8,}/"';//default pattern list
        }
        
        parent::__construct($patterns);
    }
    
    function filter($value)
    {
        $var = parent::filter($value);
        
        if ($var !== false) {
            return $var;
        }
        
        throw new FilterException('Secure password expected');
    }

}
