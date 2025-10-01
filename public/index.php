<?php

// var_dump($_SERVER['REQUEST_URI']);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method =  $_SERVER['REQUEST_METHOD'];

require_once __DIR__ . '/../src/routes/productos.php';

// Rutas de colección (todos los productos)
if ($uri === '/productos') {
    if ($method === 'GET'){
        obtenerProductos();
    } elseif ($method ==='POST'){
        crearProducto();
    } else {
        http_response_code(405);
        echo json_encode(["mensaje"=>"Método no permitido"]);
    }

// Rutas de recursos (un producto con ID)
} elseif (preg_match('#^/productos/(\d+)$#',$uri,$matches)) {
    $id = $matches[1];

    if ($method === 'GET') {
        obtenerProductosPorId($id);
    } elseif ($method === 'PUT') {
        actualizarProducto($id);
    } elseif ($method === 'DELETE') {
        eliminarProducto($id);
    } else {
        http_response_code(405);
        echo json_encode(["mensaje" => "Método no permitido"]);
    }

} else {
    http_response_code(404);
    echo json_encode(["mensaje" => "Ruta no encontrada"]);
}

// case 'POST':
//     if ($path ==='/productos') {
//         require 'productos/crear.php';
//     }
//     break;

// primer endpoint: GET /productos