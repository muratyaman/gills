<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for default filter
 */

/**
 * Class for default filter: if the value is null, default value will be used
 */
class DefaultFilter implements FilterInterface
{

    /**
     * Default value
     * @var string or scalar
     */
    protected $default;

    /**
     * Constructor
     * @param string $default
     */
    function __construct ( $default = '' )
    {
        $this->default = $default;
    }

    function filter ($value)
    {
        if (is_null($value)) {
            $value = $this->default;
        }
        
        return $value;
    }

}