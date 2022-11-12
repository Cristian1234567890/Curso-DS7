<?php
if(array_key_exists('enviar', $_POST)){
    $expire=time()+60*5;
    setcookie("user", $_POST['visitante'], $expire);
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org//1999/xhtml" xml:lang="es" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 13</title>
</head>
<body>
    <h1>Creacion de COOKIES</h1><P>
    <h2>La coockie "User" tendra solo 5 minutos de duracion </h2>

    <?php
    if(isset($_COOKIE['user'])){
        echo "<br/>Hola <b>".$_COOKIE['user']."</b> Gracias por visitar nuestro sitio web <br/>";
    }else{
    ?>
    <form name="formcoockie" method="post" action="lab132.php">
        <br/>Hola, primera vez que visitas nuestro sitio web, por favor ingresa tu nombre:
        <input type="text" name="visitante" id="visitante" value="" />
        <input type="submit" name="enviar" id="enviar" value="Gracias por identificarse" />
    <?php
    }
    ?>
    </form>

    <br/><br/><a href="lab133.php">Continuar...</a>

</body>
</html>