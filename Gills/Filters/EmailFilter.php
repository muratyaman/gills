<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for email filter
 */

/**
 * Class for email filter
 */
class EmailFilter implements FilterInterface
{
    
    public function filter($value)
    {
        $var = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($var === false) {
            throw new FilterException('Valid email address expected');
        }
        
        return $var;
    }

}
