<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for filter using a closure
 */

/**
 * Class for filter using a closure
 */
class ClosureFilter implements FilterInterface
{
    /**
     * Closure to run
     * @var Closure
     */
    private $_closure;

    /**
     * Constructor
     * @param Closure $closure
     */
    function __construct(Closure $closure = null)
    {
        if (! is_null($closure)) {
            $this->_closure = $closure;
        }
    }

    function filter($value)
    {
        if (! ($this->_closure instanceof Closure)) {
            throw new Filterexception('Filter closure missing');
        }
        
        //$result = $this->_closure($value); // this FAILS
        $result = call_user_func_array($this->_closure, array($value));
        
        return $result;
    }

}

