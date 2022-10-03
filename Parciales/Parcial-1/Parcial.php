<html>

<head>
    <title>Parcial 1</title>
</head>

<body>
    <?php
    /* Post method */
    if (array_key_exists('enviar', $_POST)) {

        if ($_REQUEST['num'] != "" and $_REQUEST['num'] % 2 == 0) {
            $m_size = $_REQUEST['num'];
            if ($m_size > 1) {
                $sum=array();
                $unit = 1;
                echo "<table border=1>";
                /* Creacion de filas */
                for ($n1 = 1; $n1 <= $m_size; $n1++) {
                    echo "<tr>";

                    for ($n2 = 1; $n2 <= $m_size; $n2++) {
                        /* Validacion de la diagonal */
                        if ($unit == $n2) {
                            /* Validacion de los bordes */
                            if ($n2 == 1 or $n2 == $m_size) {
                                echo "<td>", 0, "</td>";
                            } else {
                                $num = rand(101, 200);
                                array_push($sum, $num);
                                echo "<td bgcolor=#bdc3d6>", $num, "</td>";
                            }
                        } else {
                            echo "<td>", 0, "</td>";
                        }
                    }
                    $unit = $unit + 1;
                    echo "</tr>";
                }
                echo "</table>";

                echo "El resultado de la suma es: ". array_sum($sum);
            }
        } elseif ($_REQUEST['num'] == "") {
            echo "Introduzca un valor";
        } else {
            echo "Introduzca un número par"; 
        }
    }
    ?>
    <FORM ACTION="Parcial.php" METHOD="POST">

        <br><br>Ingrese el tamaño de la matriz : <input type="text" name="num"><br><br>
        <input type="submit" name="enviar" value="Ingresar">

    </FORM>

</body>

</html>