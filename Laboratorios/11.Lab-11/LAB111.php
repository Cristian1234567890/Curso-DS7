<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Laboratorio 11.1</title>
</head>
<body>
    <H1>Consulta de noticias</H1>

    <!-- Siguiente y anterior -->
    <div class="paginacion">
        <a href="LAB111.php?inicio=0&fin=5">[ Anterior | </a>
        <a href="LAB111.php?inicio=5&fin=7">Siguiente ]</a>
    </div>


<?php

    require_once('class/noticias.php');
    error_reporting(0);
    $obj_noticias = new noticias();
    $inicio = $_GET['inicio'];
    $fin = $_GET['fin'];

    //cargar noticias de la 1 a la 5 por defecto
    if($inicio == null && $fin == null){
        $inicio = 0;
        $fin = 5;
    }

    $noticia = $obj_noticias->consultar_noticias_paginacion($inicio, $fin);

    echo "<p>Mostrando noticias del ".$inicio +1 ." al ".$fin." de un total de 7</p>";

    $nfilas = count($noticia);

    if($nfilas > 0){
        print("<TABLE>\n");
        print("<TR>\n");
        print("<TH>Titulo</TH>\n");
        print("<TH>Texto</TH>\n");
        print("<TH>Categoria</TH>\n");
        print("<TH>Fecha</TH>\n");
        print("<TH>Imagen</TH>\n");
        print("</TR\n");

        foreach($noticia as $resultado){
            print("<TR>\n");
            print("<TD>".$resultado['titulo']."</TD>\n");
            print("<TD>".$resultado['texto']."</TD>\n");
            print("<TD>".$resultado['categoria']."</TD>\n");
            print("<TD>".date("j/n/y", strtotime($resultado['fecha']))."</TD>\n");

            if($resultado['imagen'] != ""){
                print("<TD><A TARGET='_blank' HREF='img/".$resultado['imagen']."'>
                <IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
            }else{
                print("<TD>&nbsp;</TD>\n");
            }
            print("</TR\n");
        }
        print("</TABLE>\n");
    }else{
        print("No hay noticias disponibles");
    }

?>
    
</body>
</html>