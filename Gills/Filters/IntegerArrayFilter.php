<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for array of integer filter
 */

/**
 * Class for array of integer filter
 */
class IntegerArrayFilter extends ArrayFilter
{

    public function filter($value)
    {
        $values = parent::filter($value);
        
        $filterInt = new integer();
        
        foreach ($values as $idx => $val) {
            try {
                $values[$idx] = $filterInt->filter($val);
            } catch ( FilterException $ex ) {
                throw new FilterException('Array of integers expected');
            }
        }
        
        return $values;
    }

}
