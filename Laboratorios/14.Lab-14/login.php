<?php
session_start();

if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {

    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];

    $salt = substr($usuario, 0, 2);
    $clave = crypt($clave, $salt);

    require_once ('class/usuarios.php');
    $objeto = new usuarios();
    $usuario_valido = $objeto->validar_usuario($usuario, $clave);

    foreach ($usuario_valido as $array_resp) {
        foreach ($array_resp as $value) {
            $nfilas = $value;
        }
    }

    if ($nfilas > 0 ){
        $usuario_valido = $usuario;
        $_SESSION['usuario_valido'] = $usuario_valido;
    }
}
?>

<!DOCTYPE html public "-//W3C//DTD HTML 4.0//EN">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboraotio 14  - Login al sitio de Noticias</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <?php
    //sesion iniciada
    if(isset($_SESSION['usuario_valido'])){
    ?>

    <h1>Gestion de noticias</h1>
    <hr>

    <ul>
        <li><a href="lab142.php">Listar todas las noticias</a></li>
        <li><a href="lab143.php">Listar noticias por partes</a></li>
        <li><a href="lab144.php">Buscar noticia</a></li>
    </ul>

    <hr>

    <p>[<a href="logout.php"> Desconectar<a/>]</p>

    <?php
    }
    else if(isset($usuario)){
        echo "<br><br>\n";
        echo "<p align = 'center'>Acceso no autorizado</p>\n";
        echo "<p align = 'center'>[<a href='login.php'>Volver a intentar</a>]</p>\n";
    }
    else{
    echo "<br><br>\n";
    echo "<p class='parrafocentrado'>Esta zona tiene el acceso restringido.<br>". "Para entrar debe identificarse</p> \n";

    echo "<form class='entrada' name ='login' action='login.php' method='post'>\n";
    echo "<p><label class='etiqueta_entrada'> Usuario: </label>\n";
    echo "      <input type='text' name='usuario' size='15'></p>\n";
    echo "<p><label class='etiqueta_entrada'> Clave: </label>\n";
    echo "      <input type='password' name='clave' size='15'></p>\n";
    echo "<p><input type='submit' value='Entrar'></p>\n";
    echo "</form>\n";

    echo "<p class='parrafocentrado'>NOTA: sino dispone de identificacion o tiene probemas para acceder".
    "puede ponerse en contacto con el ". "<a href='mailto:webmaster@localhost'>Administrador</a> del sitio</p>\n";
}
    ?>
    
</body>
</html>