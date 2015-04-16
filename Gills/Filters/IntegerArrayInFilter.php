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
class IntegerArrayInFilter extends ArrayFilter
{

    /**
     * Filter for valid values
     * @var InFilter
     */
    private $inFilter;
    
    /**
     * Filter for valid values
     * @var IntFilter
     */
    private $intFilter;
    
    /**
     * Constructor
     * Argument list is used as array of valid values expected
     */
    function __construct()
    {
        $validValues = func_get_args();
        
        $ff = FilterFactory::getInstance();
        $this->inFilter  = $ff->newFilter('InNonStrict', $validValues);
        $this->intFilter = $ff->newFilter('Int');
    }
    
    public function filter($value)
    {
        
        $values = parent::filter($value);//array expected
        
        foreach ($values as $idx => $val) {
            try {
                $values[$idx] = $this->intFilter->filter($val);//integer expected
                $values[$idx] = $this->inFilter->filter($values[$idx]);//among valid values
            } catch ( FilterException $ex ) {
                throw new FilterException('Array of integers expected');
            }
        }
        
        return $values;
    }

}
