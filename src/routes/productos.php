<?php
require_once __DIR__ . '/../config/database.php';
// Se gestiona para el get inicial , ahiora se crean las funciones concretas
// require_once __DIR__ . '/../controllers/ProductoController.php';

// $database = new Database();
// $db = $database->getConnection();

// $productoController = new ProductoController($db);
// $productoController->obtenerTodos();

function obtenerProductos(){
    $db = getConnection();
    $stmt = $db->query("SELECT * FROM productos");
    $productos =$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($productos);
}

function crearProducto(){
    $db = getConnection();
    $data = json_decode(file_get_contents("php://input"),true);

    if (!isset($data['nombre'],$data['descripcion'],$data['precio'],$data['stock'])){
        http_response_code(400);
        echo json_encode(["mensaje"=>"Faltan campos requeridos"]);
        return;
    }

    $stmt= $db->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?,?,?,?)");
    $stmt->execute([
        $data['nombre'],
        $data['descripcion'],
        $data['precio'],
        $data['stock']
    ]);

    http_response_code(201);
    echo json_encode(["mensaje"=>"Producto creado correctamente"]);

}