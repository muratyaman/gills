<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for HTML-safe string filter
 */

/**
 * Class for HTML-safe string filter
 */
class safe_string implements FilterInterface
{
    
    public function filter($value)
    {
        $var = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES); // quotes are not encoded
        
        if ($var === false) {
            throw new FilterException('HTML-safe text expected');
        }
        
        return $var;
    }

}
