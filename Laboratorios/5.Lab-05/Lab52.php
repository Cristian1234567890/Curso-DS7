<?php

if (is_uploaded_file ($_FILES['nombre_archivo_cliente'] ['tmp_name']))
{
    $nombreDirectorio = "archivos/";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;

    $allowed = array('gif', 'png', 'jpg', 'jpeg');
    $ext = pathinfo($nombrearchivo, PATHINFO_EXTENSION);

    if($_FILES['nombre_archivo_cliente']['size'] < 10485760 && in_array($ext, $allowed)){
        if(is_file($nombreCompleto)){
            $idUnico = time();
            $nombrearchivo = $idUnico . "-" . $nombrearchivo;
            echo "Archivo repetido, se cambiara el nombre a $nombreCompleto <br/> <br/>";
        }
        move_uploaded_file($_FILES['nombre_archivo_cliente'] ['tmp_name'], $nombreDirectorio);

        echo "El archivo se ha subido satifactoriamente  <br/> ";
    } else {
        if ($_FILES['nombre_archivo_cliente']['size'] > 10485760){
             echo "Archivo muy grande  <br/> ";
        } else {
             echo "Tipo de archivo no aseptado  <br/> ";  
        }
    }

} else {
    echo "No se ha podido subir el archivo   <br/> ";
}

?>