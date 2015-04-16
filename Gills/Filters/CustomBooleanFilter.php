<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for filter to convert (0,1) to (no,yes)
 */

/**
 * Class for filter to convert (0,1) to (no,yes)
 */
class custom_boolean implements FilterInterface
{
    
    private $true;
    
    private $false;
    
    /**
     * Constructor
     * @param mixed $true used as output for true values
     * @param mixed $false used as output for false values
     */
    function __construct ($true = 'true', $false = 'false')
    {
        $this->true  = $true;
        $this->false = $false;
    }
    
    /**
     * Filter value by applying boolean filter
     * @param mixed $value
     * @return boolean return $this->true if true, otherwise $this->false
     */
    function filter ($value)
    {
        $boolFilter = new boolean();
        
        $var = $boolFilter->filter($value) ? $this->true : $this->false;
        
        return $var;
    }
}
