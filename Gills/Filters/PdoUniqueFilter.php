<?php
namespace Gills\Filters;
use Gills\FilterInterface;
use Gills\FilterException;

/**
 * File for Unique filter
 */

/**
 * Class for Unique filter
 */
class PdoUnique implements FilterInterface
{
    /**
     * PDO object
     * @var \PDO
     */
    protected $pdo;
    
    protected $sql;
    
    /**
     * Constructor
     * @param string $table
     * @param string $criteria with parameter placeholder
     * @param string $connection_id empty string to use default connection
     */
    function __construct (\PDO $pdo = null, $table = '', $criteria = '')
    {
        //error_log(__METHOD__ . ' table ' . $table);
        $this->sql = 'SELECT COUNT(*) AS c FROM ' . $table . ' WHERE ' . $criteria;
        $this->pdo = $pdo;
    }
    
    public function filter ( $value )
    {
        $params = array($value);
        
        $qry = $this->pdo->prepare($this->sql);
        $qry->execute($params);
        $row = $qry->fetch(\PDO::FETCH_OBJ);

        if (empty($row->c) ) {
            //unlike reference filter, we expect existence of a record reference
        } else {
            throw new FilterException('Non-unique value');
        }
        
        return $value;
    }
    

}
