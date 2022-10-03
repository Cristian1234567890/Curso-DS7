<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 8.2</title>
</head>
<body>

    <form action="lab82.php" method="GET">
        <label for="num1">Ingrese su nivel de satisfaccion del 1 al 100  </label>
        <input type="number" name="num1" id="num1">
        <input type="submit" value="Enviar">
    </form>

    <!-- Mostrar una imagen según el nivel de satisfacción -->

    <?php
        include 'class_lib.php';
        if (isset($_GET['num1'])) {
            $num1 = $_GET['num1'];
            $nivel = new nivel_satisfaccion($num1);
            echo $nivel->getResultado();
            echo "<br>";
            echo "<br>".$nivel->imprimirImagen();
        }

    ?>
</body>
</html>
</html>