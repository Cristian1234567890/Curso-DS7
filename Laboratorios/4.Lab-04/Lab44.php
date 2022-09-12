<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.4</title>
</head>
<body>
    <?php
        $can = 1;
        if(array_key_exists('enviar', $_POST)){
            $pares = array();
            $impares = array();
            $campo = $_POST['num'];

            if($campo%2==0){
                for ($i=0; $i < $can ; $i++) {
                    array_push($pares, $campo); //$campo++
                    echo " |".$pares[$i]."| ";
                }
            }elseif($campo%1==0){
                echo "Introduzca un número par";
            }else{
                echo "Introduzca un valor";
            }
            $can++;
        }
    ?>
    <form action="lab44.php" method="post">
        <br><br>
        Ingrese un valor par:
        <input type="text" name="num">
        <br><br>
        <input type="submit" name="enviar" value="Ingresar">
    </form>
</body>
</html>