<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<title>Laboratorio 3.3</title>
</head>

<body>
<?PHP
    if(array_key_exits('enviar', $_POST)){
        if( $_REQUEST['Apellido'] != ""){
            echo "El apellido Ingresado es: $_REQUEST[Apellido]";
        }
        else{
            echo "Favor coloque el apellido";
        }

        echo "<BR>";

        if ($_REQUEST['Nombre']!="")
        {
            echo "El nombre Ingresado es: $_REQUEST[Nombre]";
        }
        else{
            echo "Favor coloque el nombre";
        }
    } else {
        ?>
            <form action="lab33.php" method="POST">
            Nombre: <input type="text" name="Nombre"> <br>
            Apellido: <input type="text" name="Apellido"> <br>
            <input type="SUBMIT" name="enviar" value="Enviar datos">
            </form>
        <?PHP
    }
        ?>
</body>
</html>