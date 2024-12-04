<?php

namespace app\core;

use PDO;
use PDOException;

class Database {
    private $host = DBHOST;
    private $dbName = DBNAME;
    private $username = DBUSER;
    private $password = DBPASS;
    private $connection;

    public function connect() {
        if (!$this->connection) {
            try {
                $dsn = "mysql:host=$this->host;dbname=$this->dbName;charset=utf8";
                $this->connection = new PDO($dsn, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
        return $this->connection;
    }

    public function disconnect() {
        $this->connection = null;
    }
}
