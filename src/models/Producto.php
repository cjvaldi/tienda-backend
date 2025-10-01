<?php
class Producto {
    private $conn;
    private $table = "productos";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
