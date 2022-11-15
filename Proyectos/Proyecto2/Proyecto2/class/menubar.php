<?php
    class Menubar{
        function __toString(){
            $curr_d= date("d");
            $curr_m= date("m");
            $curr_y= date("y");

            $html= "<div class='menu_bar'>
                        <div class='menu_izquierdo'>
                            <LI><a href='session.php?mes=".$curr_m."&año=".$curr_y."'>AGENDA</a></LI>
                            <LI><a href='report.php'>REPORTE</a></L1>
                            <LI><a href='index.php'>CREAR ACTIVIDAD</a><L1>
                        </div>
                        <div Class='menu_derecho'>
                            <LI><a href='logout.php'>SALIR</a></LI>
                        </div>
                     </div>";
            return $html;
        }
    }
?>