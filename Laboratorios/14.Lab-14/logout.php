<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desconectar</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <?php
    if(isset($_SESSION["usuario_valido"])){
        
        session_destroy () ;

        echo "<p> Se ha desconectado del sitio </p>\n";
        echo "<p>[<a href='login.php'>Conectar </a>]</p>\n";
    }
    
    else{
        echo "<p> No se ha iniciado sesion </p>\n";
        echo "<p>[<a href='login.php'>Conectar </a>]</p>\n";
    }
    
    ?>
    
</body>
</html>