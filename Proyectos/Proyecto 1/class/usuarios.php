<?php
    require_once('modelo.php');

    class Usuario extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

       public function validar_usuario($usr,$pass){
            $inst = "CALL sp_validar_usuario('".$usr."' , '".$pass."')";
            $consult = $this->_db->query($inst);
            $res= $consult->fetch_all(MYSQLI_ASSOC);

            if($res){
                return $res;
                $res->close();
                $this->_db->close();
            }
       }
    }
?>