<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;
use Gills\FilterFactory;

/**
 * File for array of string filter
 */

/**
 * Class for array of string filter
 */
class StringArrayInFilter extends ArrayFilter
{

    /**
     * Filter for valid values
     * @var in
     */
    private $inFilter;
    
    /**
     * Filter for valid values
     * @var in
     */
    private $strFilter;
    
    /**
     * Constructor
     * Argument list is used as array of valid values expected
     */
    function __construct()
    {
        $validValues = func_get_args();
        $ff = FilterFactory::getInstance();
        $this->inFilter  = $ff->newFilter('in', $validValues);
        $this->strFilter = $ff->newFilter('string');
    }
    
    public function filter($value)
    {
        
        $values = parent::filter($value);//array expected
        
        foreach ($values as $idx => $val) {
            try {
                $values[$idx] = $this->strFilter->filter($val);//string expected
                $values[$idx] = $this->inFilter->filter($values[$idx]);//among valid values
            } catch ( FilterException $ex ) {
                throw new FilterException('Array of strings expected');
            }
        }
        
        return $values;
    }

}
