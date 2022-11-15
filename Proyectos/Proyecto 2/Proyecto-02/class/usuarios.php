<?php
    require_once('modelo.php');

    class Usuario{
    
        public function validar_usuario($usr,$pass){
            $data = array('usr' => $usr, 'pass' => $pass);

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            if($options){
                return $options;
            }
        }
    }
?>