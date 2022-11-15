<?php

    class CalendarReport{
        //[id,fecha,hora_inicio,hora_fin,ubicacion,titulo,tipo_actividad,correo,comentarios]
        private $events=[];
        private $param, $val;

        function __construct($p,$v){
            $this->param = $p;
            $this->val= $v;
        }

        function emptyEvents(){
            $this->events=[];
        }


        function __toString(){
            
            $html="<div class='report_content'>\n
                  <div class='report_item'><H1>Actividades --    ".$this->val."</H1></div>\n
                  <div class='report_item'>
                  <table>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Fin</th>
                            <th>Ubicación</th>
                            <th>Titulo</th>
                            <th>Tipo de Actividad</th>
                            <th>Correo</th>
                            <th>Comentarios</th>
                        </tr>";
            $this->getEvents();

            if(!is_null($this->events)){
                foreach($this->events as $e){
                    $html .="<tr>
                                <td>".$e[1]."</td>
                                <td>".$e[2]."</td>
                                <td>".$e[3]."</td>
                                <td>".$e[4]."</td>
                                <td><a href='activity.php?val=".$e[0]."'>".$e[5]."</a></td>
                                <td>".$e[6]."</td>
                                <td>".$e[7]."</td>
                                <td>".$e[8]."</td>
                            </tr>";
                }
            }

            $html .= "</table>
                  </div>
                  </div>\n";

            return $html;
        }

        function getEvents(){
            $this->emptyEvents();

            require_once("calendario.php");
            $obj_cal = new Calendario();

            $res = $obj_cal->listar_filtro($this->param,$this->val);
            if(!is_null($res)){
                foreach($res as $e){

                    if($e['hora_fin']=='00:00:00'){
                        $h_fin= 'Todo el Día';
                    }
                    else{
                        $h_fin= $e['hora_fin'];
                    }

                    $this->events[]= [$e['id'],$e['fecha'],$e['hora_inicio'],$h_fin,$e['ubicacion'],$e['titulo'],$e['tipo_actividad'],$e['correo'],$e['comentarios']];
                }
            }
        }
    }

?>