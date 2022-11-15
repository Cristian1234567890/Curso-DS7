<?php
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// incluir archivos de conexion y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/Logins.php';
// obtener conexion a la base de datos
$conex = new Conexion();
$db = $conex->obtenerConexion();
// preparar el objeto usuario
$usuario = new Logins($db);

//obtenemos los datos del producto a actualizar
$data = json_decode(file_get_contents("php://input"));

if( !empty($data->usr) && !empty($data->pass))
{
    $respuesta = $usuario -> readOne($data->usr, $data->pass);

    if($respuesta){
        // asignar codigo de respuesta - 200 OK
        http_response_code(200);
        // mostrarlo en formato json
        echo json_encode(array( "Count" => $respuesta[0]["count(*)"] ));
    } else {
        http_response_code(500);
        echo json_encode(array( "Respuesta" => "No aceptado" ));
    }
} else {
    http_response_code(500);
    echo json_encode(array( "Respuesta" => "No hay parametros" ));
}

?>
