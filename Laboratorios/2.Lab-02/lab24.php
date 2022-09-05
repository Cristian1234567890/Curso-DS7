<html>
    <head>
        <title>Laboratorio 2.4</title></head>
    
    <body>
        <?php
        //creación del arreglo array ("clave" =>"valor")
        $personas = array("juan"=>"panama",
        "john"=>"USA",
        "eica"=>"finalandia",
        "kusanagi"=>"japon");

        //recorrer todo el arreglo
        foreach($personas as $persona =>$pais){
            print "$persona es de $pais<br>";
        }
        
        //impresión especifica
        echo "<br>".$personas["juan"];
        echo "<br>".$personas["eica"];
        ?>    
    </body>

</html>