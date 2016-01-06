<?php

namespace Mangati\Exporter;

use PDO;
use PDOStatement;
use Mangati\IO\InputInterface;

/**
 * DataSource
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
abstract class DataSource implements InputInterface
{
    
    /**
     * @var PDO
     */
    protected $conn;
    
    /**
     * @var PDOStatement
     */
    private $stmt;
    
    
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @return PDOStatement
     */
    abstract protected function prepare();

    /**
     * @return PDOStatement
     */
    abstract protected function parse(array $row);
    
    
    public function open()
    {
        $this->stmt = $this->prepare();
    }
    
    public function close()
    {
        $this->stmt->closeCursor();
    }

    public function read()
    {
        $row = $this->stmt->fetch();
        if ($row !== false) {
            return $this->parse($row);
        }
        // end
        return false;
    }
}