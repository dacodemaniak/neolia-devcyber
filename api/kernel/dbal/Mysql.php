<?php
/**
 * Mysql
 *  Sets connection to Mysql or MariaDb SGBD
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - PDO connection 
 */
namespace Aelion\Dbal;

class Mysql extends DBAL implements Connectable {
    public function __construct(){
        $this->dbConfig = new DbConfig();
        $this->setDSN();
    }

    public function connect(): ?\PDO {
        try {
            $pdo = new \PDO($this->dsn, $this->dbConfig->getDbUserName(), $this->dbConfig->getUserDbPassword());
            $pdo->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            return $pdo;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        
    }

    private function setDSN() {
        $this->dsn = $this->dbConfig->getDriver() . ':' .
            'host=' . $this->dbConfig->getHost() . ';' .
            'port=' . $this->dbConfig->getPort() . ';' .
            'dbname=' . $this->dbConfig->getDbName(); 
    }
}