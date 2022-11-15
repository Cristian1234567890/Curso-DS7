<?php
    require_once('modelo.php');

    class Calendario extends modeloCredencialesBD{

        public function __construct(){
            parent::__construct();
        }

        public function listar_agenda(){
            $inst= "CALL sp_listar_agenda()";

            $consult = $this->_db->query($inst);

            $res = $consult->fetch_all(MYSQLI_ASSOC);
            
            if($res){
                return $res;
                $res->close();
                $this->_db->close();
            }
        }

        public function listar_por_dia(){
            $inst= "CALL sp_listar_del_dia()";
            $consult = $this->_db->query($inst);

            $res = $consult->fetch_all(MYSQLI_ASSOC);
            
            if($res){
                return $res;
                $res->close();
                $this->_db->close();
            }
        }

        public function listar_filtro($param, $con){
            $inst = "CALL sp_listar_usuario('".$con."','".$param."')";

            $consult = $this->_db->query($inst);
            $res = $consult->fetch_all(MYSQLI_ASSOC);

            if($res){
                return $res;
                $res->close();
                $this->_db->close();
            }
        }

        public function modificar_actividad($id, $fecha, $h_inicio,$h_fin, $titulo,$ubicacion,$t_act,$correo,$comentarios){
            $inst= "CALL sp_modif_entrada('".$id."','".$fecha."', '".$h_inicio."', '".$h_fin."','".$titulo."','".$ubicacion."', '".$t_act."', '".$correo."', '".$comentarios."')";
            $consult = $this->_db->query($inst);
        }

        public function crear_actividad($fecha, $h_inicio,$h_fin, $titulo,$ubicacion,$t_act,$correo,$comentarios){
            $inst= "CALL sp_crear_entrada('".$fecha."', '".$h_inicio."', '".$h_fin."','".$titulo."','".$ubicacion."', '".$t_act."', '".$correo."', '".$comentarios."')";
            $consult = $this->_db->query($inst);
        }

        public function eliminar_actividad($val){
            $inst = "CALL sp_borrar_entrada('".$val."')";
            $consult = $this->_db->query($inst);
        }

    }
?>