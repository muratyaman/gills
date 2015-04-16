<?php
namespace Gills;

/**
 * File for Gills Exception class
 */

/**
 * Class for Gills Filter Exception
 */
class FilterException extends \Exception
{
    
    public $input_name = '';
    
}