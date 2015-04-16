#<?php
namespace Gills;

/**
 * File for Gills Filter Factory
 */

/**
 * Class for Gills Filter Factory
 * 
 */
class Filterfactory
{
    
    private function __construct()
    {
        //do nothing
    }
    
    /**
     * Get new filter object
     * @param string $filter
     * @param array  $params
     * @return Filterinterface
     * @throws Filterexception
     */
    function newFilter ($filter, array $params = array())
    {
        $filterClass = '\\Gills\Filters\\' . str_replace(['-', '_'], '', $filter) . 'Filter';
        
        $classExists = class_exists($filterClass);
        if (! $classExists) {
            //error_log('Filter not found: ' . $filter);
            throw new FilterException('Filter not found');
        }
        
        $filterObj = new $filterClass ();
        
        if (!($filterObj instanceof FilterInterface)) {
            //error_log('Invalid filter implementation: ' . $filter);
            throw new FilterException('Invalid filter implementation');
        }
        //make sure filter construct params are all optional
        call_user_func_array(array($filterObj, '__construct'), $params);
        
        return $filterObj;
    }
    
    function __call($name, array $arguments = array())
    {
        return $this->newFilter($name, $arguments);
    }
    
    //SINGLETON section ----------------------------------------------------------------------------
    /**
     * Singleton for this factory
     * @var Filterfactory
     */
    private static $instance;
    
    /**
     * Get instance of the factory
     * @return Filterfactory
     */
    static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
}
