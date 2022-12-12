<?php
    require_once('modelo.php');
    class sumatoria extends modeloCredencialesBD{
        
        public function __construct(){
            parent::__construct();
        }
        
        public function calcular($N){
   
            /* Calcular factorial y sumatoria*/
            $Sumatoria = 0;
            for ($i = 1; $i <= $N; $i++){
                $numerador = ($N+1) - $i;
                $denominador = ($N+1) - $i; 
                $dfactorial = 1;

                /* Calculo del factorial del denominador */
                for ($f = 1; $f <= $denominador; $f++){
                    $dfactorial = $dfactorial * $f; 
                }
                $Sumatoria += $numerador / $dfactorial; 
            }

            /* Calculo del factorial de N */
            $factorial = 1;
            for ($t = 1; $t <= $N; $t++){
                $factorial = $factorial * $t; 
            }


            $this->crear_sumatoria($N, $factorial,$Sumatoria);

            return $this->listar_sumatorias();
        }

        public function listar_sumatorias(){
            $inst= "CALL sp_listar_sumatoria()";

            $consult = $this->_db->query($inst);

            $res = $consult->fetch_all(MYSQLI_ASSOC);
            
            if($res){
                return $res;
                $res->close();
                $this->_db->close();
            }
        }

        public function crear_sumatoria($N, $Factorial,$Sumatoria){
            $inst= "CALL sp_entrada_sumatoria('".$N."', '".$Factorial."', '".$Sumatoria."')";
            $consult = $this->_db->query($inst);
        }


        public function actualizar_sumatorias($ID,$N){
            /* Calcular factorial y sumatoria*/
            $Sumatoria = 0;
            for ($i = 1; $i <= $N; $i++){
                $numerador = ($N+1) - $i;
                $denominador = ($N+1) - $i; 
                $dfactorial = 1;

                /* Calculo del factorial del denominador */
                for ($f = 1; $f <= $denominador; $f++){
                    $dfactorial = $dfactorial * $f; 
                }
                $Sumatoria += $numerador / $dfactorial; 
            }

            /* Calculo del factorial de N */
            $factorial = 1;
            for ($t = 1; $t <= $N; $t++){
                $factorial = $factorial * $t; 
            }
            $ID = intval( $ID );
            $N = intval( $N );

            $inst= "CALL sp_actualizar_sumatoria('".$ID."', '".$N."', '".$factorial."', '".$Sumatoria."')";            
            $consult = $this->_db->query($inst);
                    
            return $this->listar_sumatorias();
        }
    }
?>