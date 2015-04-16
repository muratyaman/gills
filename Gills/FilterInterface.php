<?php
namespace Gills;

/**
 * File for Gills Filter Interface
 */

/**
 * Gills Filter Interface
 */
interface FilterInterface
{

    /**
     * Initialize filter with arguments
     */
    //function initFilter();

    /**
     * Implement a function to sanitize/validate value, throw exception on failure
     * @param mixed $value
     * @return mixed
     * @throws FilterException
     */
    function filter ( $value );
    
}