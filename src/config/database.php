<!-- < ?php
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
} -->

<?php
function getConnection() {
    $host = 'localhost';
    $dbname = 'tienda_camisetas';
    $user = 'root';
    $pass = '';

    try {
        return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
        exit;
    }
}