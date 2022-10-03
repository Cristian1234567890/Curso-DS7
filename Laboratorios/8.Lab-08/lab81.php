<!DOCTYPE html>
<html lang="">
<head>
<title>Lab 8.1</title>
</head>
<body>
    <form action="lab81.php" method="post">
        <label for="numero">Ingrese un numero: </label>
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Enviar">
    </form>
<?php
// Include the class library
include 'class_lib.php';
//mosrar el resultado y validar que el numero sea mayor a 1
if (isset($_POST['numero']) && $_POST['numero'] >= 1) {
    $fibonacci = new fibonacci($_POST['numero']);
    echo "El resultado es: " . $fibonacci->getResultado();
    echo "<br>";
    echo "La serie es: ";
    $fibonacci->imprimirSerie();
}
?>

</body>
</html>