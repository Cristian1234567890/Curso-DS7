<html>
    <head>
        <title>Laboratorio 2.7</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <?php
        $posicion ="arriba";

        switch($posicion){
            case "arriba"://bloque 1
                echo "la variable contiene";
                echo " el valor arriba";
                break;
            case "abajo"://bloque 2
                echo "la variable contiene";
                echo " el valor abajo";
                break;
            default: // Bloque 3
                echo "la variable contiene otro valor";
                echo " distinto de arriba y abajo";
        }
        ?>    
    </body>

</html>