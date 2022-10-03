<!DOCTYPE html>
<html lang="">
    <head>
        <title>Laboratorio 4.5</title></head>
    
    <body>
    <form ACTION="lab83.php" METHOD="POST">
        <br>Ingrese el tamaño de la matriz : 
        <input type="text" name="num"><br>
        <input type="submit" name= "enviar" value="Ingresar">
</form>
        <?php
        include 'class_lib.php';
        //manejo_de_matrices
        if (isset($_POST['num'])) {
            $num = $_POST['num'];
            //Validar que el numero sea par
            if ($num % 2 == 0) {
                $matriz = new manejo_de_matrices($num);
                $matriz->imprimirMatriz();
            } else {
                echo "El numero debe ser par";
            }
        }
        ?>
  
    </body>

</html>