<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    private $producto;

    public function __construct($db) {
        $this->producto = new Producto($db);
    }

    public function obtenerTodos() {
        $stmt = $this->producto->obtenerTodos();
        $productos = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = $fila;
        }

        echo json_encode($productos);
    }
}
