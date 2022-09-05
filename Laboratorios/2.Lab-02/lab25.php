<html>
    <head>
        <title>Laboratorio 2.5</title></head>
    
    <body>
        <?php
            $figuras = array('cuadrado','triangulo','circulo');
            $figuras[1]='rectangulo';

            mostrar_figuras($figuras,"asignacion de rectangulo");

            array_push($figuras,'pentagono');
            mostrar_figuras($figuras,"adicion de pentagono al final");

            array_unshift($figuras,'hexagono');
            mostrar_figuras($figuras,"adición del Hexagono al inicio");

            array_pop($figuras);
            mostrar_figuras($figuras,"eliminación del último");

            array_shift($figuras);
            mostrar_figuras($figuras,"eliminación del Primero");

            function mostrar_figuras($figuras, $mensaje)
            {
                echo "<br>Arreglo Después de $mensaje<br>";
                foreach($figuras as $figura)
                {
                    echo "$figura <br>";
                }
            }
        ?>    
    </body>

</html>