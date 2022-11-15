<?php

class Calender {
    // conexion de base de datos y tabla productos
    private $conn;
    // atributos de la clase
    public $respuesta;
    // constructor con $db como conexion a base de datos

    public function __construct( $db ) {
        $this->conn = $db;
    }

    function listar() {
        $inst= "CALL sp_listar_agenda()";

        $consult = $this->conn->query($inst);

        $res = $consult->fetch_all(MYSQLI_ASSOC);
        
        if($res){
            return $res;
            $res->close();
            $this->conn->close();
        }
    }

    function listar_dia(){
        $inst= "CALL sp_listar_del_dia()";
            $consult = $this->conn->query($inst);

            $res = $consult->fetch_all(MYSQLI_ASSOC);
            
            if($res){
                return $res;
                $res->close();
                $this->conn->close();
            }
    }

    public function listar_filtro($param, $con){
        $inst = "CALL sp_listar_usuario('".$con."','".$param."')";

        $consult = $this->conn->query($inst);
        $res = $consult->fetch_all(MYSQLI_ASSOC);

        if($res){
            return $res;
            $res->close();
            $this->conn->close();
        }
    }

    public function crear_actividad($fecha, $h_inicio,$h_fin, $titulo,$ubicacion,$t_act,$correo,$comentarios){
        $inst= "CALL sp_crear_entrada('".$fecha."', '".$h_inicio."', '".$h_fin."','".$titulo."','".$ubicacion."', '".$t_act."', '".$correo."', '".$comentarios."')";
        $consult = $this->_db->query($inst);
    }

    public function eliminar_actividad($val){
        $inst = "CALL sp_borrar_entrada('".$val."')";
        $consult = $this->conn->query($inst);
    }

    public function modificar_actividad($id, $fecha, $h_inicio,$h_fin, $titulo,$ubicacion,$t_act,$correo,$comentarios){
        $inst= "CALL sp_modif_entrada('".$id."','".$fecha."', '".$h_inicio."', '".$h_fin."','".$titulo."','".$ubicacion."', '".$t_act."', '".$correo."', '".$comentarios."')";
        $consult = $this->_db->query($inst);
    }

}
?>