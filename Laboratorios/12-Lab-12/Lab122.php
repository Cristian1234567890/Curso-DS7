<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns='http://www.w3.org//1999/xhtml' xml:lang='es' lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
    <title>Laboratorio 12</title>
</head>

<body>
    <h1>Manejo de sesiones</h1>
    <h2> Paso 2: se accede a la variable de sesion almacenada y se destruye</h2>

    <?php
    if (isset($_SESSION['var1'])) {
        $var1 = $_SESSION['var1'];
        echo "La variable de sesion es: $var1 \n";
        unset($_SESSION['var1']);
        echo "<a href='Lab123.php'>Paso 3:</a>";
    } else {
        echo "La variable de sesion no existe, ir a <a href='Lab121.php'>Paso 1:</a> para iniciar la sesion \n";
    }

    ?>
</body>

</html>