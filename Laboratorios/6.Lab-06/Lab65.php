<?php

class ClaseBase {
    public function test() {
        echo 'ClaseBase::test() llamada\n';
    }
    final public function masTests() {
        echo 'ClaseBase::masTests() llamada\n';
    }
}

class ClaseHijo extends ClaseBase {
    public function masTests() {
        echo 'ClaseHijo::masTests() llamada\n';
    }
}

// Resultado:
// Fatal error: Cannot override final method ClaseBase::masTests()
//De acuerdo con el manual de PHP, no puede anular los métodos finales. Sin embargo, si intenta hacerlo, obtendrá un error fatal.
?>