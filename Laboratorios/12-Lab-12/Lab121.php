<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org//1999/xhtml" xml:lang="es" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 12</title>
</head>
<body>
    <h1>Manejo de sesiones</h1>
    <h2> Paso 1: se crea la variable de sesion y se almacena</h2> 
    
    <?php
    $var1 = "Ejemplo de sesiones";
    $_SESSION['var1'] = $var1;
    echo "La variable de sesion se ha creado y almacenado \n";

    ?>
    <a href="Lab122.php">Paso 2:</a>
</body>
</html>