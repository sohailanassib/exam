<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $error = null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if ($id) {
            $host = 'localhost'; // Database host
            $db_name = 'task'; // Database name
            $username = 'root'; // Database username
            $password = ''; // Database password
            $conn;
            $table = 'products';
            $dsn = "mysql:host=" . $host . ";dbname=" . $db_name;
            $conn = new PDO($dsn, $username, $password);
            $sql = "DELETE FROM " . $table . " WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt;
        } else {
            echo "No ID provided.";
        }
    }
}
