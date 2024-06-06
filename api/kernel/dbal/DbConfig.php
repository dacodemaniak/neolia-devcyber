<?php
/**
 * DbConfig
 *  Configuration class gathering credentials, physics
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Properties, getter, setter, deserializer
 */
namespace Aelion\Dbal;

class DbConfig {
    private string $driver;
    private string $host;
    private int $port;
    private string $dbUserName;
    private string $dbUserPassword;
    private string $dbName;

    public function __construct() {
        $this->init();
    }

    public function getDriver(): string {
        return $this->driver;
    }

    public function getHost(): string {
        return $this->host;
    }

    public function getPort(): int {
        return $this->port;
    }

    public function getDbUserName(): string {
        return $this->dbUserName;
    }

    public function getUserDbPassword(): string {
        return $this->dbUserPassword;
    }

    public function getDbName(): string {
        return $this->dbName;
    }
    
    private function init(): void {
        $this->parseDsn();
    }

    private function parseDsn(): void {
        $dsn = $_ENV['DSN'];

        $dsnParts = explode('//', $dsn);
        $this->driver = substr($dsnParts[0], 0, strlen($dsnParts[0]) - 1);
        array_shift($dsnParts);

        $splitter = explode('@', $dsnParts[0]);

        $credentials = $splitter[0];
        $db = $splitter[1];

        $credentialsParts = explode(':', $credentials);
        $this->dbUserName = $credentialsParts[0];
        $this->dbUserPassword = $credentialsParts[1];

        $dbParts = explode('/', $db);
        $this->dbName = array_pop($dbParts);
        $hostAndPort = explode(':', $dbParts[0]);
        $this->host = $hostAndPort[0];
        $this->port = (int) $hostAndPort[1];

    }
}