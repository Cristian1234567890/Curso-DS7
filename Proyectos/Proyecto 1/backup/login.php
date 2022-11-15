<?php
    session_start();

    if(isset($_REQUEST['usuario'])&& isset($_REQUEST['clave'])){
        $usuario = $_REQUEST['usuario'];
        $clave= $_REQUEST['clave'];

        require_once("class/usuarios.php");
        
        $obj_usuarios= new Usuario();
        $usuario_validado = $obj_usuarios->validar_usuario($usuario,$clave);

        foreach($usuario_validado as $array_resp){
            foreach($array_resp as $value){
                $nfilas= $value;
            }
        }

        if($nfilas>0){
            $usuario_valido = $usuario;
            $_SESSION["usuario_valido"]=$usuario_valido;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14.1- Login al sitio de Noticias</title>
    <LINK REL ="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</head>
<body>
    <?php
        //Sesión iniciada.
        if(isset($_SESSION["usuario_valido"])){
    ?>
    <H1> GESTION DE NOTICIAS</H1>

    <HR>
        <UL>
            <LI><A HREF="session.php">Ver Agenda</A>
            <LI><A HREF="index.php">Añadir Nueva Actividad</A>
        </UL>        
    <HR>
        <p>[<A HREF='logout.php'>Desconectar</A>]</P>
    <?php
        }
        //Intento de entrada fallido
        else if(isset($usuario)){
            print("<BR><BR>\n");
            print("<P ALIGN='CENTER'> Acceso no autorizado</P>\n");
            print("<P ALIGN='CENTER'>[<A HREF='login.php'>Conectar</A>]</P>\n");
        }
        //Sesion no iniciada
        else{
            print("<BR><BR>\n");
            print("<P CLASS='parrafocentrado'>Esta zona tiene el acceso restringido.<BR>"."Para entrar debe identificarse </P>\n");
            print("<FORM CLASS='entrada' NAME='login' ACTION='login.php' METHOD='POST'>\n");
            print("<P><LABEL CLASS='etiqueta-entrada'> Uusario:</LABEL>\n");
            print("     <INPUT TYPE='text' NAME='usuario' SIZE='15'></P>\n");
            print("<P><LABEL CLASS='etiqueta-entrada'>Clave:</LABEL>\n");
            print("     <INPUT TYPE='password' NAME='clave' SIZE='15'></P>\n");
            print("<P><INPUT TYPE='submit' VALUE='entrar'></P>\n");
            print("</FORM>");
        }
    ?>
    
</body>
</html>