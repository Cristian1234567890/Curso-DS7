<?php
//actualizar producto mediante API 
// metodo http - PUT
// encabezados obligatorios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//incluimos el archivo de configuracion de la base de datos
include_once '../configuracion/conexion.php';
//incluimos el archivo de objeto producto
include_once '../objetos/producto.php';
//obtenemos la conexion a la base de datos
$conexion = new Conexion();
$db = $conexion->obtenerConexion();
//instanciamos el objeto producto
$producto = new Producto($db);
//obtenemos los datos del producto a actualizar
$data = json_decode(file_get_contents("php://input"));
//verificamos que los datos no esten vacios
if(
!empty($data->id) &&
!empty($data->nombre) &&
!empty($data->descripcion) &&
!empty($data->precio) &&
!empty($data->categoria_id)
){
//asignamos los valores de los datos a las propiedades del objeto producto
$producto->id = $data->id;
$producto->nombre = $data->nombre;
$producto->descripcion = $data->descripcion;
$producto->precio = $data->precio;
$producto->categoria_id = $data->categoria_id;
$producto->actualizado = date('Y-m-d H:i:s');
//actualizamos el producto
if($producto->actualizar()){
//asignamos el codigo de respuesta - 200 ok
http_response_code(200);
//informamos al usuario
echo json_encode(array("message" => "El producto ha sido actualizado."));
}
//si no se puede actualizar el producto, informamos al usuario
else{
//asignamos el codigo de respuesta - 503 servicio no disponible
http_response_code(503);
//informamos al usuario
echo json_encode(array("message" => "No se puede actualizar el producto."));
}
}
//si los datos estan incompletos, informamos al usuario
else{
//asignamos el codigo de respuesta - 400 solicitud incorrecta
http_response_code(400);
//informamos al usuario
echo json_encode(array("message" => "No se puede actualizar el producto. Los datos
están incompletos."));
}


?>