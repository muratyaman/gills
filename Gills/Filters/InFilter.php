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
class InFilter implements FilterInterface
{
    /**
     * Default comparison
     * @var bool
     */
    protected $compare_strict = true;

    /**
     * List of valid values
     * @var array
     */
    protected $_values = array();
    
    /**
     * Constructor
     * Argument list is used as array of valid values expected
     * Also, we can send 1 argument which is an array
     */
    function __construct()
    {
        $values = func_get_args();
        if (count($values) == 1 && isset($values[0]) && is_array($values[0])) {
            $values = $values[0];
        }
        $this->_values = $values;
    }

    function filter($value)
    {
        if ( ! in_array($value, $this->_values, $this->compare_strict) ) {
            throw new FilterException(
                'Value must be one of: ' . implode(', ', $this->_values)
            );
        }
        
        return $value;
    }

}