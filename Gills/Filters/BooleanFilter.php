<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for boolean filter
 */

/**
 * Class for boolean filter
 */
class FilterBoolean implements FilterInterface
{
    /**
     * Valid values to represent true
     * @var array
     */
    protected $trueValues = array();
    
    /**
     * Valid values to represent false
     * @var array
     */
    protected $falseValues = array();
    
    /**
     * Constructor
     * @param array $trueValues
     * @param array $falseValues
     */
    function __construct (
        $trueValues  = array('1', 'true', 'yes', 'y', 'on',  true,  1, -1),
        $falseValues = array('0', 'false', 'no', 'n', 'off', false, 0, '', null)
    )
    {
        $this->trueValues  = $trueValues;
        $this->falseValues = $falseValues;
    }
    
    function filter ($value)
    {
        $strictMatch = true;
        if (in_array($value, $this->trueValues, $strictMatch)) {
            return true;
        }
        
        if (in_array($value, $this->falseValues, $strictMatch)) {
            return false;
        }
        
        throw new Filterexception(
            'A boolean expression expected: ' . implode(', ', $this->trueValues + $this->falseValues)
        );
    }
}
