<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" HREF="css/estilos.css">
    <title>Calendar APP</title>
</head>
<body>
    
    <?php
        if(isset($_SESSION["usuario_valido"])){
            require_once("class/menubar.php");

            $obj_menu = new Menubar();

            echo $obj_menu;
    ?>
        <H1>AGENDA </H1>
        <?php
            require_once("class/calendario.php");

            if($_SERVER['REQUEST_METHOD']==='POST'){
                $obj_cal= new Calendario();
                $noticia = $obj_cal->listar_filtro('id',$_REQUEST['val']);
                $nfilas= count($noticia);
            
                if($nfilas>0){
                    foreach ($noticia as $res){
                        print("<div class='make_modif'>\n");
                        print("<FORM  METHOD='POST' ACTION='activity.php'>\n");
                        print("Fecha: <INPUT TYPE='date' NAME='fecha' PLACEHOLDER='yyyy-mm-dd' MIN='1997-01-01' MAX='2030-12-31' VALUE=".$res['fecha']."><BR>\n");
                        print("Hora de Inicio<INPUT TYPE='time' NAME='hora_inicio' VALUE=".$res['hora_inicio']."><BR>\n");
                        print("Hora Fin:<INPUT TYPE='time' NAME='hora_fin' id='hora_fin' VALUE=".$res['hora_fin']."><input type='checkbox' name='repetir' id='repetir' value='repetir'>Repetir todo el día<br>\n");
                        print("Ubicación:<INPUT TYPE='text' NAME='ubicacion' VALUE='".$res['ubicacion']."'><BR>\n");
                        print("Titulo<INPUT TYPE='text' NAME='titulo' VALUE='".$res['titulo']."'><BR>\n");
                        print("Tipo de Actividad: <SELECT NAME='tipo_actividad'><OPTION value='".$res['tipo_actividad']."' SELECTED>".$res['tipo_actividad']."<OPTION VALUE='reunion'>Reunión<OPTION VALUE='visita'>Visita<OPTION VALUE='capacitacion'>Capacitación<OPTION VALUE='inspeccion'>Inspección<OPTION VALUE='otro'>Otro</SELECT><BR>\n");
                        print("Correo: <INPUT TYPE='text' name='correo' VALUE='".$res['correo']."'><BR>\n");
                        print("Comentarios: <TEXTAREA NAME='comentarios' cols='100' rows='10'>".$res['comentarios']."</TEXTAREA><BR>\n");
                        print("<INPUT TYPE='submit' name='mod' VALUE='Modificar'>");
                        print("<INPUT NAME='val' TYPE='hidden' VALUE='".$res['id']."'></FORM>\n");
                        print("</div>\n");
                    }
                    print("</FORM>\n");
                }
                else{
                    print("No available activities");
                }   
            }
            else{
                echo "No data found!";
            }
        }
        else{
            print("<BR><BR>\n");
            print("<P ALIGN='CENTER'>Acceso no autorizado</P>\n");
            print("<P ALIGN='CENTER'>[<A HREF='login.php' TARGET='_top'>Conectar</A>]</P>\n");
        }
    ?>

    <script type=text/javascript>
        
        if(document.getElementById('repetir').checked){
            document.getElementById('hora_fin').disable=true;
        }
        else{
            document.getElementById('hora_fin').disable=false;
        }
    
    </script>
</body>
</html>