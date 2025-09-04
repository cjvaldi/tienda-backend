<?php
header("Access-Control-Allow_Origin: *");
header("Content-Type: application/json;charset=UTF-8");
header("Access-Control-Alloow-Methods:POST");

require_once '../../config/database.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));
if (
    !empty($data->nombre) &&
    !empty($data->precio) &&
    !empty($data->stock)) 
    {
        $query="INSERT INTO productos (nombre, precio, stock) VALUES (:nombre, :precio, :stock)";
        $stmt=$db->prepare($query);

        $stmt->bindParam(":nombre", $data->nombre);
        $stmt->bindParam(":precio", $data->precio);
        $stmt->bindParam(":nombre", $data->stock);

        if ($stmt->execute()){
            http_response_code(201);
            echo json_encode(["message"=>"Producto creado exitosamente"]);
        } else {
            http_response_code(503);
            echo json_encode(["message"=>"no se pudo crear el Producto"]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["message"=>"Datos incompletos"]);
    }