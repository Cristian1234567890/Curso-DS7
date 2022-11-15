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
            

            print("<TABLE>\n");
            print("<TR>\n");
            print("<TH>FECHA</TH>\n");
            print("<TH>HORA DE INICIO</TH>\n");
            print("<TH>HORA DE FIN</TH>\n");
            print("<TH>UBICACIÓN</TH>\n");
            print("<TH>TITULO</TH>\n");
            print("<TH>TIPO DE ACTIVIDAD</TH>\n");
            print("<TH>CORREO</TH>\n");
            print("<TH>COMENTARIOS</TH>\n");
            print("<TH></TH>\n");
            print("</TR>\n");

            if($_SERVER['REQUEST_METHOD']==='GET'){
                $obj_cal= new Calendario();
                $cal = $obj_cal->listar_filtro('id',$_REQUEST['val']);
                $nfilas= count($cal);
                
                if($nfilas>0){
                    foreach ($cal as $res){
                        print("<TR>\n");
                        print("<TD>".$res['fecha']."</TD>\n");
                        print("<TD>".$res['hora_inicio']."</TD>\n");
                        print("<TD>".$res['hora_fin']."</TD>\n");
                        print("<TD>".$res['ubicacion']."</TD>\n");
                        print("<TD>".$res['titulo']."</TD>\n");
                        print("<TD>".$res['tipo_actividad']."</TD>\n");
                        print("<TD>".$res['correo']."</TD>\n");
                        print("<TD>".$res['comentarios']."</TD>\n");
                        print("<TD><div class='action_activity'>
                                        <FORM METHOD='POST' ACTION='mod-activity.php'>
                                        <INPUT NAME='mod' VALUE='Modificar' TYPE='submit'>
                                        <INPUT NAME='val' VALUE=".$res['id']." TYPE='HIDDEN'>
                                        </FORM></div></TD>\n");
                        print("<TD><div class='action_activity'>
                                        <FORM  METHOD='POST' ACTION='activity.php'>
                                        <INPUT NAME='del' VALUE='Eliminar' TYPE='submit'>
                                        <INPUT NAME='val' VALUE=".$res['id']." TYPE='HIDDEN'>
                                        </FORM></div>\n");
                        print("</TR>\n");
                    }
                    print("</TABLE>\n");
                }
                else{
                    print("</TABLE>\n");
                    print("No available activities");
                }   
            }
            else if($_SERVER['REQUEST_METHOD']==='POST'){
                $obj_cal= new Calendario();
                if(array_key_exists('mod',$_POST)){
                    //print("Se ejecuta ACCION DE POST");
                    $obj_cal->modificar_actividad($_REQUEST['val'],$_REQUEST['fecha'],$_REQUEST['hora_inicio'],$_REQUEST['hora_fin'],$_REQUEST['titulo'],$_REQUEST['ubicacion'],$_REQUEST['tipo_actividad'],$_REQUEST['correo'],$_REQUEST['comentarios']);
                
                    $cal = $obj_cal->listar_filtro('id',$_REQUEST['val']);
                    $nfilas= count($cal);
            
                    if($nfilas>0){
                        foreach ($cal as $res){
                            print("<TR>\n");
                            print("<TD>".$res['fecha']."</TD>\n");
                            print("<TD>".$res['hora_inicio']."</TD>\n");
                            print("<TD>".$res['hora_fin']."</TD>\n");
                            print("<TD>".$res['ubicacion']."</TD>\n");
                            print("<TD>".$res['titulo']."</TD>\n");
                            print("<TD>".$res['tipo_actividad']."</TD>\n");
                            print("<TD>".$res['correo']."</TD>\n");
                            print("<TD>".$res['comentarios']."</TD>\n");
                            print("<TD><div class='action_activity'>
                                        <FORM METHOD='POST' ACTION='mod-activity.php'>
                                        <INPUT NAME='mod' VALUE='Modificar' TYPE='submit'>
                                        <INPUT NAME='val' VALUE=".$res['id']." TYPE='HIDDEN'>
                                        </FORM></div></TD>\n");
                            print("<TD><div class='action_activity'>
                                        <FORM  METHOD='POST' ACTION='activity.php'>
                                        <INPUT NAME='del' VALUE='Eliminar' TYPE='submit'>
                                        <INPUT NAME='val' VALUE=".$res['id']." TYPE='HIDDEN'>
                                        </FORM></div>\n");
                            print("</TR>\n");
                        }
                        print("</TABLE>\n");
                    }
                    else{
                        print("</TABLE>\n");
                        print("No available activities");
                    }   
                }
                
                if(array_key_exists('del',$_POST)){
                    $obj_cal->eliminar_actividad($_REQUEST['val']);
                }
                
            }
            else{
                print("No available activities");
            }
        }
        else{
            print("<BR><BR>\n");
            print("<P ALIGN='CENTER'>Acceso no autorizado</P>\n");
            print("<P ALIGN='CENTER'>[<A HREF='login.php' TARGET='_top'>Conectar</A>]</P>\n");
        }
    ?>
</body>
</html>