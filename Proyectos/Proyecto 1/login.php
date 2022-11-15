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
    <title>CALENDAR APP</title>
    <LINK REL ="stylesheet" TYPE="text/css" HREF="css/estilos.css">
</head>
<body>
    <?php
        //Sesión iniciada.
        if(isset($_SESSION["usuario_valido"])){
            $curr_m= date("m");
            $curr_y= date("y");
            header("Location:session.php?mes=".$curr_m."&año=".$curr_y);
            
        }
        //Intento de entrada fallido
        else if(isset($usuario)){
            print("<BR><BR>\n");
            print("<div class='noaccess'><P ALIGN='CENTER'> Acceso no autorizado</P>\n");
            print("<P ALIGN='CENTER'>[<A HREF='login.php'>Conectar</A>]</P></div>\n");
        }
        //Sesion no iniciada
        else{
            print("<BR><BR>\n");
            print("<div class='noaccess'><H1>Esta zona tiene el acceso restringido.<BR>"."Para entrar debe identificarse </H1></div>\n");
            print("<div class='entrada'><FORM NAME='login' ACTION='login.php' METHOD='POST'>\n");
            print("<LABEL CLASS='etiqueta-entrada'> Usuario:</LABEL>\n");
            print("<INPUT TYPE='text' NAME='usuario' SIZE='15'><br>\n");
            print("<LABEL CLASS='etiqueta-entrada'>Clave:</LABEL>\n");
            print("<INPUT TYPE='password' NAME='clave' SIZE='15'><br>\n");
            print("<INPUT TYPE='submit' VALUE='Entrar'>\n");
            print("</FORM></div>");
        }
    ?>
    
</body>
</html>