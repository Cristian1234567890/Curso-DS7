<?php
    $diametro = $_POST['diam'];
    $altura = $_POST['altur'];
    $radio = $diametro/2;
    $PI = 3.14.1593;
    $voulumen= $PI*$radio*$radio*$altura;
    echo "<br/> El volumen del cilindo es de ". $voulumen. " metros cubicos";

?>