<?php

class Logins {
    // conexion de base de datos y tabla productos
    private $conn;
    // atributos de la clase
    public $respuesta;
    // constructor con $db como conexion a base de datos

    public function __construct( $db ) {
        $this->conn = $db;
    }

    // leer un solo producto
    function readOne($usr,$pass) {
        $inst = "CALL sp_validar_usuario('".$usr."' , '".$pass."')";
        $consult = $this->conn->query($inst);
        $res= $consult->fetch_all(MYSQLI_ASSOC);

        if($res){
            return $res;
            $res->close();
            $this->conn->close();
        }
    }
}
?>