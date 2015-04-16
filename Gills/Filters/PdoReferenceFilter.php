<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for PDO Reference filter
 */

/**
 * Class for PDO Reference filter
 */
class PdoReferenceFilter implements FilterInterface
{
    /**
     * PDO object
     * @var \PDO
     */
    protected $pdo;

    /**
     * SQL to select records
     * @var string
     */
    protected $sql;
    
    /**
     * Constructor
     * @param \PDO   $pdo
     * @param string $table
     * @param string $criteria with parameter placeholder
     */
    function __construct (\PDO $pdo = null, $table = '', $criteria = '' )
    {
        $this->pdo = $pdo;
        $this->sql = 'SELECT COUNT(*) AS c FROM ' . $table . ' WHERE ' . $criteria;
    }
    
    public function filter ( $value )
    {
        $params = array($value);
        
        $qry = $this->pdo->prepare($this->sql);
        $qry->execute($params);
        $row = $qry->fetch(\PDO::FETCH_OBJ);
        
        if (! empty($row->c) ) {
            //unlike unique filter, we expect existence of a record reference
        } else {
            throw new FilterException('Unknown reference');
        }
        
        return $value;
    }
    

}
