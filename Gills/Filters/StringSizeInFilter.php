<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for string size filter
 */

/**
 * Class for string size filter
 */
class StringSizeIn implements FilterInterface
{
    /**
     * Valid string sizes
     * @var array of int
     */
    protected $sizes = array();

    /**
     * Constructor
     * Argument list is the list of valid sizes: 10, 13
     */
    function __construct ()
    {
        $args = func_get_args();
        if (!empty($args)) {
            foreach ($args as $arg) {
                $size = intval($arg);
                if ($size >= 0) {
                    $this->sizes[] = $size;
                }
            }
        }
        sort($this->sizes);
    }

    function filter($value)
    {
        if (! is_string($value)) {
            throw new FilterException('Text expected');
        }
        
        $size = mb_strlen($value);
        if (! in_array($size, $this->sizes)) {
            throw new FilterException('Text length must be one of ' . implode(', ', $this->sizes));
        }
        
        return $value;
    }

}