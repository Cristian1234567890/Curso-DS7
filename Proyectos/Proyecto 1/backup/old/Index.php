<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" HREF="css/estilo.css">
    <title>Calendar APP</title>
</head>
<body>

    <?php 
        if(isset($_SESSION["usuario_valido"])){
            print("<A href='session.php'>Regresar Agenda</A>\n");                
        }else
        {
            print("<A Href='login.php'>Ingresar</A>\n");
        }
    ?>

    
    <H1>CREAR ENTRADA DE ACTIVIDAD</H1>
    <FORM NAME='formcreate' METHOD='POST' ACTION='Index.php'>
    Fecha:<INPUT TYPE='date' NAME='fecha' PLACEHOLDER='yyyy-mm-dd' MIN='1997-01-01' MAX='2030-12-31' ><BR>
    Hora de Inicio<INPUT TYPE='time' NAME='hora_inicio'><BR>
    Hora Fin:<INPUT TYPE='time' NAME='hora_fin'><BR>
    Ubicación:<INPUT TYPE='text' NAME='ubicacion'><BR>
    Titulo<INPUT TYPE='text' NAME='titulo'><BR>
    Tipo de Actividad: <SELECT NAME='tipo_actividad'>
        <OPTION VALUE='reunion' SELECTED>Reunión
        <OPTION VALUE='visita'>Visita
        <OPTION VALUE='capacitacion'>Capacitación
        <OPTION VALUE='otro'>Otro</SELECT><BR>
    Correo: <INPUT TYPE='text' name='correo'><BR>
    Comentarios: <TEXTAREA NAME='comentarios' cols='40' rows='5'></TEXTAREA><BR>
    <INPUT TYPE='submit' VALUE='Crear'>
    </FORM>


    <?php
        require_once("class/calendario.php");

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $obj_cal = new Calendario();
            $obj_cal->crear_actividad($_REQUEST['fecha'],$_REQUEST['hora_inicio'],$_REQUEST['hora_fin'],$_REQUEST['titulo'],$_REQUEST['tipo_actividad'],$_REQUEST['correo'],$_REQUEST['fecha'],$_REQUEST['comentarios']);
        }
    ?>

</body>
</html>