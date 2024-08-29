<?php
class Database {
    private $host = 'localhost';      // Database host
    private $db_name = 'task'; // Database name
    private $username = 'root'; // Database username
    private $password = ''; // Database password
    private $conn;

    public function __construct() {
        $this->connect();
    }

    // Establish a connection to the database
    private function connect() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            // Set PDO attributes
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }

    // Execute a query with optional parameters and return the statement
    public function query($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            echo "Query error: " . $e->getMessage();
            return false;
        }
    }

    // Fetch a single record from the database
    public function fetch($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt ? $stmt->fetch() : false;
    }

    // Fetch all records from the database
    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt ? $stmt->fetchAll() : false;
    }

    // Get the last inserted ID
    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }

    // Close the connection (optional, as PDO closes automatically at the end of the script)
    public function close() {
        $this->conn = null;
    }
}
?>