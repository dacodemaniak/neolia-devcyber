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

abstract class DBAL {

    private static DBAL $instance = null;

    protected DbConfig $dbConfig;
    protected $dsn;

    private function __construct() {
        $this->dbConfig = new DbConfig();
    }

    public abstract function connect(): ?\PDO;

    public static function getConnection(): \PDO {
        if (is_null(self::$instance)) {
            $dbal = new DBAL();
            self::$instance = match ($dbal->dbConfig->getDriver()) {
                'mysql' => new Mysql()
            };
        }
        return self::$instance->connect();
    }


}