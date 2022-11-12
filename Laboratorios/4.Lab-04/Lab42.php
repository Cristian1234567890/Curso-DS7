<?php
    $numero = $_POST['rendimiento'];
    $result = obtieneFactorial($numero);
    echo " El factorial de " . $numero. " es " . $result;

    function obtieneFactorial($numero){ 
        $factorial = 1; 
        for ($i = 1; $i <= $numero; $i++){ 
          $factorial = $factorial * $i; 
        } 
        return $factorial; 
    } 
?>