<?php
    require_once('modelo.php');

    class Votos extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function listar_votos(){
            $inst= "CALL sp_listar_votos()";

            $consult = $this->_db->query($inst);

            $res = $consult->fetch_all(MYSQLI_ASSOC);
            
            if($res){
                return $res;
                $res->close();
                $this->_db->close();
            }
        }

        public function actualizar_votos($v1, $v2){
            $inst = "CALL sp_actualizar_votos('".$v1."','".$v2."')";
            $act= $this->_db->query($inst);

            if($act){
                return $act;
                $act->close();
                $this->_db->close();
            }


        }
        
    }
?>