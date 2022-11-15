<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','usbw');
define('DB_NAME','agenda');

class Conexion{
 // especificar las credenciales de base de datos
 public $conn;
 // obtener la conexion de la base de datos
 public function obtenerConexion(){
 $this->conn = null;
 try{
 $this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
 }catch(PDOException $exception){
 echo "Error de conexion a base de datos: " . $exception->getMessage();
 }
 return $this->conn;
 }
}
?>
