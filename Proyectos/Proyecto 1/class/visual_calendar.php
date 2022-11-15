<?php
    class VisualCalendar{
        private $active_m,$active_d,$active_y;
        private $activity=[];

        function __construct($current_m,$current_d,$current_y){
            $this->active_m= $current_m;
            $this->active_d= $current_d;
            $this->active_y= $current_y;
        }

        function __toString(){
            
            $html= "";
            //Cantidad de dias en el mes
            $num_days = date('t', strtotime($this->active_d. '-' . $this->active_m . '-' . $this->active_y));
            
            //cantidad de dias del mes pasado
            $num_days_pass = date('t', strtotime($this->active_d. '-' . $this->active_m-1 . '-' . $this->active_y));

            //Esto nos ayuda a identificar el nombre del dia, el sistema los guarda en ingles.
            $week_days=[0=>'Sun',1=>'Mon',2=>'Tue', 3=>'Wed', 4=>'Thu', 5=>'Fri', 6=>'Sat'];
            //Esto es para la visualización del mes en español
            $months_es=[1=>'Enero',2=>'Febrero', 3=>'Marzo', 4=>'Abril', 5=>'Mayo', 6=>'Junio',
                        7=>'Julio',8=>'Agosto',9=>'Septiembre', 10=>'Octubre',11=>'Noviembre',12=>'Diciembre'];  
            //Esto es para la visualziacion del nombre del dia en español.
            $week_days_es=[0=>'Domingo',1=>'Lunes',2=>'Martes', 3=>'Miercoles', 4=>'Jueves', 5=>'Viernes', 6=>'Sabado'];
            //Aqui buscamos con que nombre de dia comienza la el mes.
            $first_day_of_week = array_search(date('D', strtotime($this->active_y . '-' . $this->active_m . '-1')), $week_days);
            
            if($this->active_m==1){
                $prev_month=12;
                $prev_year= $this->active_y-1;
            }
            else{
                $prev_month= $this->active_m-1;
                $prev_year = $this->active_y;
            }
            
            if($this->active_m==12){
                $next_month=1;
                $next_year= $this->active_y+1;
            }
            else{
                $next_month= $this->active_m+1;
                $next_year= $this->active_y;
            }

            $html ="<DIV class='titulo'><H1><a HREF='session.php?mes=".$prev_month."&año=".$prev_year."'>".$months_es[$prev_month]." - ".$prev_year."</a></H1> <H1> - "
                        .$months_es[$this->active_m]." - ".$this->active_y." - </H1><H1><a HREF='session.php?mes=".$next_month."&año=".$next_year."'>".$months_es[$next_month]." - ".$next_year."</a></H1></DIV>\n
                    <TABLE>\n
                    <TR>\n";
            //Añadimos los nombres de los dias de la semana
            foreach ($week_days_es as $d){
                $html .= "<TH>".$d."</TH>\n";
            }
            $html.="</TR><TR>\n";
            //buscamos los eventos.
            $this->getEvents();
            
            //contador del numero de dias.
            $cont_d=1;

            //Ingresaremos la primera fila, de esta forma por el hecho que los meses no siempre empezaran el Lunes.
            for($i=0;$i<7;$i++){
                $html.="<TD><div class='calendario-dia'>\n
                        <div class='actividad-dia'>\n";
                if($i>=$first_day_of_week){
                    $html.=$cont_d."\n";
                    foreach($this->activity as $act){
                        if(date('y-m-d', strtotime($this->active_y . '-' . $this->active_m . '-' . $cont_d .'-'.'0'.' day')) == date('y-m-d', strtotime($act[1]))){
                            //$html.="Actividad es: ".$act[0]." Hora de Inicio: ".$act[2]." Hora de Fin: ".$act[3]." Titulo: ".$act[4]."\n";
                            $html .= "<div class='actividad-desc'>
                            <div class='actividad-contenido'>
                                <p1 class='actividad-hora'>".$act[2]."</p1>
                                <p1 class='actividad-hora'>|</p1>
                                <p1 class='actividad-hora'>".$act[3]."</p1>
                            </div>
                            <div class='actividad-contenido'>
                                <p1 class='actividad-titulo'><a href=''>".$act[4]."</a></p1>
                            </div>
                                
                            </div>";
                        }
                    }
                    $cont_d = $cont_d+1;
                }
                
                $html .="</div></div>\n
                        </TD>\n";
            }
            $html .= "</TR>\n";
            //Ingresamos el resto de los dias de la semana.
            for($i=$cont_d; $i<=$num_days; $i=$i+7){
                $html.="<TR>\n";
                $day=$i;
                for($d=0; $d<7;$d++){
                    if($day<=$num_days){
                        if(date('y-m-d',strtotime($this->active_y.'-'.$this->active_m.'-'.$day)) == date('y-m-d',strtotime($this->active_y.'-'.$this->active_m.'-'.$this->active_d))){
                            $html.="<TD style='background-color:#4477FD;'><div class='calendario-dia'>\n
                                <div class='actividad-dia'>".$day."\n
                                </div>\n";
                        }
                        else{
                            $html.="<TD><div class='calendario-dia'>\n
                                <div class='actividad-dia'>".$day."\n
                                </div>\n";
                        }
                    }
                    
                    

                    foreach($this->activity as $act){
                        //print("Fecha 1: ".date('y-m-d',strtotime($this->active_y.'-'.$this->active_m.'-'.$cont_d))."<br>\n");
                        //print("Fecha 2: ".date('y-m-d', strtotime($act[1]))."<br>\n");
                        if(date('y-m-d',strtotime($this->active_y.'-'.$this->active_m.'-'.$day)) == date('y-m-d', strtotime($act[1]))){
                            //$html.="Actividad es: ".$act[0]." Hora de Inicio: ".$act[2]." Hora de Fin: ".$act[3]." Titulo: ".$act[4]."\n";
                            $html .= "<div class='actividad-desc'>
                                        <div class='actividad-contenido'>
                                            <p1 class='actividad-hora'>".$act[2]."</p1>
                                            <p1 class='actividad-hora'>|</p1>
                                            <p1 class='actividad-hora'>".$act[3]."</p1>
                                        </div>
                                        <div class='actividad-contenido'>
                                        <p1 class='actividad-titulo'><a href=activity.php?val=".$act[0].">".$act[4]."</a></p1>
                                        </div>
                                
                                    </div>\n";
                        }
                    }
                    $html .= "</div></TD>";
                    $day=$day+1;
                }
                $html.="</TR>\n";   
            }

            //Finalizamos y retornamos 
            $html .="</TABLE>";
            return $html;
        }

        function getEvents(){
            require_once("calendario.php");
            $obj_cal= new Calendario();

            $e= $obj_cal->listar_agenda();

            if(!is_null($e)){
                foreach($e as $res){

                    if($res['hora_fin']=='00:00:00'){
                        $h_fin= 'Todo el Día';
                    }
                    else{
                        $h_fin= $res['hora_fin'];
                    }

                    $this->activity[]= [$res['id'],$res['fecha'],$res['hora_inicio'],$h_fin,$res['titulo']];
                }
                /*
                foreach($this->activity as $act){
                    print("Actividad es: ".$act[0]." Hora de Inicio: ".$act[1]." Hora de Fin: ".$act[2]." Titulo: ".$act[3]."\n");
                }*/
            }
        }
    }
?>