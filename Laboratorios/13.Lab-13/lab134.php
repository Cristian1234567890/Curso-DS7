<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 13</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <h1>Eliminar coockie</h1>

    <?php
    if (isset($_COOKIE['user'])) {
        setcookie("user", "", time() + 60*5);
        echo "<h2> Cookie 'user' ha sido eliminada!</h2><br/>";
    } else {
        echo "<h2> La coockie 'user' no existe </h2><br/>";
    } 

    if(isset($_COOKIE['contador'])){
        setcookie("contador","" , time() +365*24*60*60);
        echo "<h2> Cookie 'contador' ha sido eliminada!</h2><br/>";
    }else{
        echo "<h2> La coockie 'contador' no existe </h2><br/>";
    }

    ?>
    <br /><a href="lab131.php">Volver al contador de visitas</a>;
    <br /><a href="lab134.php">Volver al saludo a usuario</a>

</body>
</html>