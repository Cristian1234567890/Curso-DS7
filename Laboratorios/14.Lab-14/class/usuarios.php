<?php
require_once 'modelo.php';

class usuarios extends modeloCredencialesBD{
    public function __construct(){
        parent::__construct();
    }

    public function validar_usuario($usuario, $password){
        $instruccion = "CALL sp_validar_usuario('" . $usuario . "', '" . $password . "')";
        $consulta =$this->_db->query($instruccion);
        $resultado =$consulta->fetch_all(MYSQLI_ASSOC);


        if($resultado){
            return $resultado;
            $resultado->close();
            $this ->_db->close();
    }
    }
}
?>