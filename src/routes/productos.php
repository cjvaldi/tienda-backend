<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/ProductoController.php';

$database = new Database();
$db = $database->getConnection();

$productoController = new ProductoController($db);
$productoController->obtenerTodos();
