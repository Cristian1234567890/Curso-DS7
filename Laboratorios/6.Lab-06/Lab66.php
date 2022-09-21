<?php
final class ClaseBase {
    public function test() {
        echo 'ClaseBase::test() llamada\n';
    }
    // Aquí da igual si se declara el método como
    // final o no
    final public function moreTesting() {
        echo 'ClaseBase::moreTesting() llamada\n';
    }
}

class ClaseHijo extends ClaseBase {
}

// Resultado:
/*Fatal error: Class ClaseHijo cannot extend final class ClaseBase in C:\xampp\htdocs\HT2\LAB6\lab66.php on line 13
PHP 5 introduce la nueva palabra clave final, que impide que las clases hijas sobrescriban un método*/
?>