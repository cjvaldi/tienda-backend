<?php
class Database {
    private $host = "localhost";
    private $db_name = "tienda_camisetas";
    private $username = "root";
    private $password = ""; // Cambia si tienes contraseña
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Error en conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
