<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" HREF="css/estilo.css">
    <title>Laboratorio 9.2</title>
</head>
<body>
    <H1>Consultar VOTOS </H1>

  
    <?php
        require_once("class/votos.php");

        $obj_vot= new Votos();
        $r_votos = $obj_vot->listar_votos();
        
        foreach($r_votos as $voto){
            $votos1= $voto['votos1'];
            $votos2= $voto['votos2'];

        }
        $total_v= $votos1+$votos2;

        print("<TABLE>\n");
        print("<TR>\n");
        print("<TH>RESPUESTA</TH>\n");
        print("<TH>VOTOS</TH>\n");
        print("<TH>PORCENTAJE</TH>\n");
        print("<TH>REPRESENTACIÓN GRAFICA</TH>\n");
        print("</TR>\n");

        $p = round(($votos1/$total_v)*100,2);

        print("<TR>\n");
        print("<TD CLASS = 'izquierda'>Si</TD>\n");
        print("<TD CLASS = 'derecha'>$votos1</TD>\n");
        print("<TD CLASS = 'derecha'>$p%</TD>\n");
        $p=$p*4;
        print("<TD CLASS = 'izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$p ."'></TD>\n"); 
        print("</TR>\n");


        $p = round(($votos2/$total_v)*100,2);

        print("<TR>\n");
        print("<TD CLASS = 'izquierda'>Si</TD>\n");
        print("<TD CLASS = 'derecha'>$votos2</TD>\n");
        print("<TD CLASS = 'derecha'>$p%</TD>\n");
        $p=$p*4;
        print("<TD CLASS = 'izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$p. "'></TD>\n"); 
        print("</TR>\n");

        print("</TABLE>\n");
        print("<P>Numero total de votos emitidos: $total_v</P>\n");
        print("<P><A HREF='lab-101.php'>Pagina de votacion</A></P>\n");
    ?>
</body>
</html>