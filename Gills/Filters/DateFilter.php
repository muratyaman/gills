<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for date filter
 */

/**
 * Class for date filter
 */
class DateFilter implements FilterInterface
{
    
    private $format;
    
    function __construct ($format = 'Y-m-d H:i:s')
    {
        $this->format = $format;
    }
    
    function filter ($value)
    {
        if ( is_null($value) or (trim($value) === '') ) {
            //use filter nil-to-null
            return $value;
        }
        
        $dotted = str_replace('/', '.', $value);
        $ts = strtotime($dotted);//unix timestamp
        if ($ts === false) {
            throw new FilterException('Valid date expected');
        }
        $value = date($this->format, $ts);
        
        return $value;
    }
}
