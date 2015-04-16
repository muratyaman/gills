<?php
namespace Gills;

/**
 * File for base filter
 */

/**
 * Class for base filter
 */
class FilterBase implements FilterInterface
{

    protected $errorMessage = '';

    function setFilterError($errorMessage = '')
    {
        $this->errorMessage = $errorMessage;
    }

    function initFilter()
    {
        //do something with arguments
    }

    function filter($value)
    {
        return $value;
    }
    
}
