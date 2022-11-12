<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 16.1</title>
</head>
<body>
    <h1> Consulta de servicio web de conversion de temperaturas</h1>

    <form name="FormConv" method="POST" action="lab161.php"></form> Convertir desde:
        <br>
        <select name="temp">
            <option value="CtoF" selected>Celsius a Fahrenheit</option>
            <option value="FtoC">Fahrenheit a Celsius</option>
        </select> el valor:
        <input type="number" name="valor" step="Any" required>
        <input name="Convertir" value="Convertir" type="submit">
        
    </form>

    <?php
    $servicio = "https://www.w3schools.com/xml/tempconvert.asmx?wdsl";
    $parametros = array();

    if (array_key_exists('Convertir', $_POST)) {
        
        $valor = $_POST['valor'];
        $temp = $_POST['temp'];

        if ($temp == "CtoF") {
            $parametros['Celsius'] = $valor;
            $client = new SoapClient($servicio, $parametros);
            $resultadoObj = $client->CelsiusToFahrenheit($parametros);
            $resultado = $resultadoObj->CelsiusToFahrenheitResult;
        } else {
            $parametros['Fahrenheit'] = $valor;
            $client = new SoapClient($servicio, $parametros);
            $resultadoObj = $client->FahrenheitToCelsius($parametros);
            $resultado = $resultadoObj->FahrenheitToCelsiusResult;
            
        }
        print ("<br> La temperatura $valor".substr($temp, 0, 1)." equivale a $resultado".substr($temp, 3, 1)."");
    }

    ?>
</body>
</html>