<?php
    class ReportMenu{

        function __toString(){
            $html="<div class= 'report_menu'>\n
                        <div class='report_menu_item'>\n
                            <form name='tipo_actividad' method='POST' action='report.php'>
                                <SELECT NAME='tipo_actividad'>
                                    <OPTION VALUE='reunion' SELECTED>Reunión
                                    <OPTION VALUE='visita'>Visita
                                    <OPTION VALUE='capacitacion'>Capacitación
                                    <OPTION VALUE='inspeccion'>Inspección
                                    <OPTION VALUE='otro'>Otro</SELECT>
                                <input name='buscar_t_actividad' value='Buscar por Actividad' type ='submit'>

                                <label>Día</label>
                                <input type='text' name='dia'>
                                <input name='buscar_d' value='Buscar por Día' type ='submit'>

                                <label>Mes</label>
                                <input type='text' name='mes'>
                                <input name='buscar_m' value='Buscar por Mes' type ='submit'>

                                <label>Año</label>
                                <input type='text' name='año'>
                                <input name='buscar_a' value='Buscar por Año' type ='submit'>
                            </form>\n
                        </div>
                    
                    </div>";


            return $html;
        }
    }

?>