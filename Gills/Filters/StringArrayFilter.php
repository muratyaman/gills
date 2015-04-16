<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for array of string filter
 */

/**
 * Class for array of string filter
 */
class StringArrayFilter extends ArrayFilter
{

    public function filter($value)
    {
        $values = parent::filter($value);
        
        $filterString = new StringFilter();
        
        foreach ($values as $idx => $val) {
            try {
                $values[$idx] = $filterString->filter($val);
            } catch ( FilterException $ex ) {
                throw new FilterException('Array of strings expected');
            }
        }
        
        return $values;
    }

}
