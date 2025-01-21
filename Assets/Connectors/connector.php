<?php
class Database {
    private $host = '';
    private $dbName = '';
    private $username = '';
    private $password = '';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct() {
        $this -> connect();
    }


    private function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";

        try {
            $this -> pdo = new PDO($dsn, $this -> username, $this -> password, [
                PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
                PDO:: ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC,
                PDO:: ATTR_PERSISTENT => false,
                PDO:: ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {

            die("Database connection failed: ".htmlspecialchars($e -> getMessage()));
        }
    }


    public function query($sql, $params = []) {
        try {
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: ".htmlspecialchars($e -> getMessage()));
        }
    }


    public function disconnect() {
        $this -> pdo = null;
    }


    public function getPDO() {
        return $this -> pdo;
    }
}
