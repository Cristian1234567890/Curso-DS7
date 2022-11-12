<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 20</title>
</head>
<body>
    <form action="lab201.php" method="POST">
        Nombre: <input type="text" name="nombre" id="nombre"><br>
        Apellido: <input type="text" name="apellido" id="apellido"><br>
        Email: <input type="email" name="email" id="email"><br>
        Edad: <input type="number" name="edad" id="edad" min="0" max="120"><br>
        <input type="submit" name="guardar" value="Guardar datos">
    </form>

    <?php
        include("UsuariosMDB.php");
        $usrs = new usuariosMBD();

        if (array_key_exists("guardar", $_POST)) {
            $usrs->insertarUsuario($_REQUEST["nombre"], $_REQUEST["apellido"], $_REQUEST["email"], $_REQUEST["edad"]);
            echo "Registro insertado correctamente";
        }

        echo "<h2>Usuarios</h2>";
        
        $usrs->obtenerUsuarios();



    ?>

</body>
</html>