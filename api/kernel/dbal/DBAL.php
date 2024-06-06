<?php
/**
 * Database Abstraction Layer
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - env reader
 *  - DSN parser
 *  - Class factory
 */
namespace Aelion\Dbal;

class DBAL {

    private static ?DBAL $instance = null;
    private static ?Connectable $pdoInstance = null;

    protected ?DbConfig $dbConfig = null;
    protected $dsn;

    private function __construct() {
        $this->dbConfig = new DbConfig();
    }

    public static function getInstance(): DBAL {
        if (is_null(self::$instance)) {
            self::$instance = new DBAL();
        }
        return self::$instance;
    }

   

    public static function getConnection(): \PDO {
        if (is_null(self::$pdoInstance)) {
            self::$instance = DBAL::getInstance();
            self::$pdoInstance = match (self::$instance->dbConfig->getDriver()) {
                'mysql' => new Mysql()
            };
        }
        return self::$pdoInstance->connect();
    }


}