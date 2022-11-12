<html>
    <head>
        <title>Laboratorio 4.3</title></head>
    
    <body>
        <?php
        //Recibimos los parametros
            $v_min = $_POST['min'];
            $v_max= $_POST['max'];

        //Inicializamos contadores
            $i_max=0;
            $r_max=0;
            $a= array();
            echo "<b>Creacion de Arreglo automatizado:</b> <br><br>";
            
            for($i=1; $i<=20;$i++){
                $a[$i]=rand($v_min,$v_max);
                if($r_max==$a[$i]){
                    $a[$i]=$r_max-1;
                }
                if($r_max<$a[$i]){
                    $r_max=$a[$i];
                    $i_max=$i;
                }
            
                echo "|".$a[$i]."|";
            }
            echo "<br><br> el valor maximo es: ".$r_max." <br/> en el indice: ".$i_max;
        ?>    
    </body>

</html>