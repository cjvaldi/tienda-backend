<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/productos') {
    require_once __DIR__ . '/../src/routes/productos.php';
} else {
    http_response_code(404);
    echo json_encode(["mensaje" => "Ruta no encontrada"]);
}
// primer endpoint: GET /productos