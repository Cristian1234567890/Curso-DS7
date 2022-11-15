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
        
        }else
        {
    ?>
   
            <div class='menu_bar'>
                <div class='menu_izquierdo'>
                            <LI><a href='index.php'>CREAR ACTIVIDAD</a><L1>
                        </div>
                        <div Class='menu_derecho'>
                            <LI><a href='logout.php'>INGRESAR</a></LI>
                        </div>
            </div>
    <?php
        }
    ?>
   
    <div class="create_content">
        <div class="create_title">
            <H1>CREAR ENTRADA DE ACTIVIDAD</H1>
        <div class="create_form">
            <FORM  METHOD='POST' ACTION='Index.php'>
            <LABEL>Fecha:</LABEL><INPUT TYPE='date' NAME='fecha' PLACEHOLDER='yyyy-mm-dd' MIN='1997-01-01' MAX='2030-12-31' ><BR>
            <LABEL>Hora de Inicio</LABEL><INPUT TYPE='time' NAME='hora_inicio'><BR>
            <LABEL>Hora Fin:</LABEL><INPUT TYPE='time' NAME='hora_fin'><BR>
            <LABEL>Ubicación:</LABEL><INPUT TYPE='text' NAME='ubicacion'><BR>
            <LABEL>Titulo:</LABEL><INPUT TYPE='text' NAME='titulo'><BR>
            <LABEL>Tipo de Actividad: </LABEL><SELECT NAME='tipo_actividad'>
                <OPTION VALUE='reunion' SELECTED>Reunión
                <OPTION VALUE='visita'>Visita
                <OPTION VALUE='capacitacion'>Capacitación
                <OPTION VALUE='inspeccion'>Inspección
                <OPTION VALUE='otro'>Otro</SELECT><BR>
            <LABEL>Correo:</LABEL> <INPUT TYPE='text' name='correo'><BR>
            <LABEL>Comentarios:</LABEL> <TEXTAREA NAME='comentarios' cols='100' rows='10'></TEXTAREA><BR>
            <INPUT TYPE='submit' VALUE='Crear'>
            </FORM>
        </div>
    </div>


    <?php
        require_once("class/calendario.php");

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $obj_cal = new Calendario();
            $obj_cal->crear_actividad($_REQUEST['fecha'],$_REQUEST['hora_inicio'],$_REQUEST['hora_fin'],$_REQUEST['titulo'],$_REQUEST['ubicacion'],$_REQUEST['tipo_actividad'],$_REQUEST['correo'],$_REQUEST['comentarios']);
        }
    ?>

</body>
</html>