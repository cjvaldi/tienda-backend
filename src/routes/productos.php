<?php
require_once __DIR__ . '/../config/database.php';
// Se gestiona para el get inicial , ahora se crean las funciones concretas
// require_once __DIR__ . '/../controllers/ProductoController.php';

// $database = new Database();
// $db = $database->getConnection();

// $productoController = new ProductoController($db);
// $productoController->obtenerTodos();

// Lógica para GET
function obtenerProductos()
{
    $database =  new Database();
    $db = $database->getConnection();

    $query = "SELECT * FROM productos";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($productos);
}

// Lógica para POST
function crearProducto()
{
    // Obtener datos del cuerpo de la petición
    $data = Json_decode(file_get_contents("php://input"), true);

    if (
        !isset($data['nombre']) ||
        !isset($data['descripcion']) ||
        !isset($data['precio']) ||
        !isset($data['stock'])
    ) {
        http_response_code(400);
        echo json_encode(["mensaje" => "Datos incompletos"]);
        return;
    }

    $nombre = htmlspecialchars(strip_tags($data['nombre']));
    $descripcion = htmlspecialchars(strip_tags($data['descripcion']));
    $precio = floatval(($data['precio']));
    $stock = intval(($data['stock']));

    $database =  new Database();
    $db = $database->getConnection();

    $query =  "INSERT INTO productos (nombre, descripcion, precio, stock) 
        VALUES (:nombre, :descripcion, :precio, :stock)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':stock', $stock);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["mensaje" => "Producto creado correctamente"]);
    } else {
        http_response_code(response_code: 500);
        echo json_encode(["mensaje" => "Error al crear el producto"]);
    }
    
}

function obtenerProductosPorId($id) {
    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT id , nombre,descripcion, precio, stock FROM productos WHERE id = :id LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo json_encode($row);
    } else {
        http_response_code(404);
        echo json_encode(["mensaje" => "Producto no encontradp"]);
    }
}


// *********************************************************************************
// usando la clase Database
// function obtenerProductos(){
//     $db = getConnection();
//     $stmt = $db->query("SELECT * FROM productos");
//     $productos =$stmt->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($productos);
// }

// function crearProducto(){
//     $db = getConnection();
//     $data = json_decode(file_get_contents("php://input"),true);

//     if (!isset($data['nombre'],$data['descripcion'],$data['precio'],$data['stock'])){
//         http_response_code(400);
//         echo json_encode(["mensaje"=>"Faltan campos requeridos"]);
//         return;
//     }

//     $stmt= $db->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?,?,?,?)");
//     $stmt->execute([
//         $data['nombre'],
//         $data['descripcion'],
//         $data['precio'],
//         $data['stock']
//     ]);

//     http_response_code(201);
//     echo json_encode(["mensaje"=>"Producto creado correctamente"]);

// }