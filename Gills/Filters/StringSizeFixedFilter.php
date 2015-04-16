<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for fixed-size string filter
 */

/**
 * Class for fixed-size string filter
 */
class StringSizeFixedFilter implements FilterInterface
{
    /**
     * Size of string expected
     * @var int
     */
    protected $size;
    
    /**
     * Constructor
     * @param int $size
     */
    function __construct ( $size = null )
    {
        $this->size = intval($size);
    }

    function filter($value)
    {
        if (!is_string($value)) {
            throw new FilterException('Text expected');
        }
        
        $size = mb_strlen($value);

        if ($size != $this->size) {
            throw new FilterException('Text length must be ' . $this->size);
        }
        
        return $value;
    }

}