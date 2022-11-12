<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" HREF="css/estilo.css">
    <title>Laboratorio 10.1</title>
</head>
<body>
    
    <?php
        require_once("class/votos.php");

        $obj_vot= new Votos();
        $vot = $obj_vot->listar_votos();
        $voto1 =0;
        $voto2=0;

        foreach ($vot as $res){
            $voto1 = $res['votos1'];
            $voto2 = $res['votos2'];
        }
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            $v = $_REQUEST['voto'];
            
            if($v=="si"){
                $voto1= $voto1+1;
            }
            else if($v ="no"){
                $voto2= $voto2+1;
            }

            $obj_vot = new Votos();
            $r_vot =$obj_vot->actualizar_votos($voto1,$voto2);
            
            if($r_vot){
                print("<P>Su voto ha sido registrado. Gracias por participar.</P>\n");
                print("<A HREF='lab-102.php' >Ver Resultados!</A>\n");

            }
            else{
                print("<A HREF='lab-101.php'>Error al Actualizar su voto!</A>\n");
            }
        }
        

        
    ?>

    <H1>ENCUESTA</H1>
    <P>¿Cree ud. que el precio de la vivienda seguira subiendo al ritmo actual?</P>
    <FORM ACTION="lab-101.php" METHOD ="POST">
        <INPUT TYPE="RADIO" NAME="voto" value="si" CHECKED>Si<BR>
        <INPUT TYPE="RADIO" NAME="voto" value="no">No<BR><BR>
        <INPUT TYPE="SUBMIT" NAME="enviar" VALUE="Votar">
    </FORM>

    <A HREF="lab-102.php">Ver Resultados</A>
</body>
</html>