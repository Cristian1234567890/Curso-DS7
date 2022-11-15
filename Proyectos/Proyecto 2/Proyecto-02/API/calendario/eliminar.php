<?
//eliminar producto mediante meotodo http DELETE
// requerir encabezados
header( "Access-Control-Allow-Origin: *" );
header( "Content-Type: application/json; charset=UTF-8" );
header( "Access-Control-Allow-Methods: DELETE" );
header( "Access-Control-Max-Age: 3600" );
header( "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With" );
// incluir archivos de conexion y objeto
include_once '../configuracion/conexion.php';
include_once '../objetos/producto.php';
// obtener conexion a la base de datos
$conexion = new Conexion();
$db = $conexion->obtenerConexion();
// preparar el objeto producto
$producto = new Producto($db);
// obtener id del producto a eliminar
$data = json_decode(file_get_contents( "php://input" ));
// establecer id del producto a eliminar
$producto->id = $data->id;
// eliminar el producto
if($producto->eliminar()){
    // establecer codigo de respuesta - 200 ok
    http_response_code(200);
    // informar al usuario
    echo json_encode(array( "message" => "El producto ha sido eliminado." ));
}
// si no se puede eliminar el producto
else{
    // establecer codigo de respuesta - 503 servicio no disponible
    http_response_code(503);
    // informar al usuario
    echo json_encode(array( "message" => "No se puede eliminar el producto." ));
}
?>
