<?php
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: application/json');
// incluir archivos de conexion y objetos
include_once '../configuracion/conexion.php';
include_once '../objetos/Calender.php';
// obtener conexion a la base de datos
$conex = new Conexion();
$db = $conex->obtenerConexion();
// preparar el objeto calendario
$calendario = new Calender($db);

//obtenemos los datos del producto a actualizar
$data = json_decode(file_get_contents("php://input"));

if( !empty($data->val))
{
    $respuesta = $calendario -> eliminar_actividad($data->val);

    if($respuesta){
        // asignar codigo de respuesta - 200 OK
        http_response_code(200);
        // mostrarlo en formato json
        echo json_encode($respuesta);
    } else {
        http_response_code(200);
        echo json_encode(array( "Ejecutado" => "aceptado" ));
    }
} else {
    http_response_code(500);
    echo json_encode(array( "Respuesta" => "No hay parametros" ));
}

?>
