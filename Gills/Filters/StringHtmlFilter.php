<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for HTML-string filter
 */

/**
 * Class for HTML-string filter
 */
class StringHtmlFilter implements FilterInterface
{
    /**
     * List of tag names e.g. '<a>,<p>,<span>,<div>'
     * @see http://php.net/manual/en/function.strip-tags.php
     * @var string
     */
    private $allowable_tags;
    
    /**
     * Construct
     * @param string $allowable_tags CSV of tag names e.g. 'a,p,span,div'
     */
    function __construct ( $allowable_tags = '' )
    {
        
        $allowable_tags = str_replace(' ', '', trim($allowable_tags));
        $allowable_tagsArr = explode(',', $allowable_tags);
        foreach ($allowable_tagsArr as $i => $allowable_tag) {
            $allowable_tagsArr[$i] = '<' . $allowable_tag . '>';
        }
        
        $this->allowable_tags = implode('', $allowable_tagsArr);
    }
    
    /**
     * @see strip_tags
     * @see FilterInterface::filter()
     */
    public function filter ( $value )
    {
        if (!is_string($value)) {
            throw new FilterException('Text expected');
        }
        
        $var = strip_tags($value, $this->allowable_tags);
        
        return $var;
    }

}
