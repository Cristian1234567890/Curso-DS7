<?php
    $rendimiento = $_POST['rendimiento'];
   
    if($rendimiento >= 80){
        echo " <img src='Feliz.jpg' alt='irl in a jacket' width='500' height='600'>";
    } elseif ($rendimiento > 50 and $rendimiento < 80) {
        echo " <img src='Normal.jpg' alt='irl in a jacket' width='500' height='600'>";
    }
    else {
        echo " <img src='Triste.jpg' alt='irl in a jacket' width='500' height='600'>";
    }
?>