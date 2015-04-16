<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for URL filter
 */

/**
 * Class for URL filter
 */
class UrlFilter implements FilterInterface
{
    
    
    public function filter($value)
    {
        $var = trim($value);
        if ( $var === '' ) return '';//USE required filter if needed
        
        if ( $var === 'about:blank' ) {//special case
            return $var;
        }
        
        if ( substr($var, 0, 7) == 'http://' ){
            //ok
        } elseif ( substr($var, 0, 8) == 'https://' ) {
            //ok
        } else {
            //either reject or add http://
            $var = 'http://' . $var;
        }
        
        $res = filter_var($var, FILTER_VALIDATE_URL);
        
        if ( $res === false ) {
            throw new FilterException('Valid URL required');
        }
        
        return $var;
    }

}
