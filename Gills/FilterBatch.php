<?php
namespace Gills;

/**
 * File for Gills Filter Chain class
 */

/**
 * Class for Gills Filter Chain
 */
class FilterBatch
{
    
    /**
     * Apply an array of filter to one value
     * @param mixed $value
     * @param array $filters
     * @return mixed
     * @throws FilterException
     */
    static function apply($value = null, array $filters = array())
    {
        //error_log(__METHOD__ . ' value: ' . json_encode($value));
        $filterFactory = FilterFactory::getInstance();
        
        foreach ($filters as $idx => $filterArr) {
            //error_log(__METHOD__ . ' loop: ' . $idx . ': ' . json_encode($filterArr));
            if (empty($filterArr[0])) continue;//skip
            
            $filterName   = $filterArr[0];
            //error_log(__METHOD__ . ' loop: ' . $idx . ' filter ' . $filterName);
            
            $filterErr    = isset($filterArr[1]) ? $filterArr[1] : '';
            $filterParams = isset($filterArr[2]) ? $filterArr[2] : array();
            
            $filter = $filterFactory->newFilter($filterName, $filterParams);
            
            try {
                $value = $filter->filter($value);
            } catch (FilterException $ex) {
                $msg = ($filterErr !== '' ? $filterErr : $ex->getMessage());
                throw new FilterException($msg);
            }
        }
        
        return $value;
    }
    
}
