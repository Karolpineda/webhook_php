1<?php
// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Método no permitido
    echo json_encode(["error" => "Método no permitido"]);
    exit;
}

// Leer el cuerpo de la solicitud
$input = file_get_contents("php://input");
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400); // Solicitud incorrecta
    echo json_encode(["error" => "JSON inválido"]);
    exit;
}

// Registrar los datos recibidos
file_put_contents("log.txt", print_r($data, true), FILE_APPEND);

// Responder al cliente
http_response_code(200); // Éxito
echo json_encode(["message" => "Evento procesado con éxito"]);
