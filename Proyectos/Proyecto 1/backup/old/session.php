<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" HREF="css/estilo.css">
    <title>Calendar APP</title>
</head>
<body>

    <?php
        if(isset($_SESSION["usuario_valido"])){
    ?>
        <H1>AGENDA </H1>

        <FORM NAME="FormFiltro" METHOD="post" ACTION="session.php">
            Filtrar por: <SELECT NAME="campos">
                <OPTION value="correo" SELECTED>Correo
                <OPTION value="titulo">Titulo
                <OPTION Value="fecha">Fecha
            </SELECT>
            Con el valor: 
            <input TYPE="text" NAME="valor">
            <INPUT NAME="ConsultarFiltro" VALUE="Filtrar por Datos" TYPE="submit"/>
            <INPUT NAME="ConsultarTodos" VALUE="Ver todos" TYPE="submit"/>
            <INPUT NAME="ConsultarDia" VALUE="Ver del Día" TYPE ="submit"/>
        </FORM>
    <?php
            require_once("class/calendario.php");

            $obj_cal= new Calendario();
            $cal = $obj_cal->listar_por_dia();
            
            if(array_key_exists('consultarDia',$_POST)){
                $obj_cal= new Calendario();
                $cal = $obj_cal->listar_por_dia();
            }

            if(array_key_exists('ConsultarTodos',$_POST)){
                $obj_cal= new Calendario();
                $cal = $obj_cal->listar_agenda();
            }

            if(array_key_exists('ConsultarFiltro',$_POST)){
                $obj_cal= new Calendario();
                $cal = $obj_cal->listar_filtro($_REQUEST['campos'],$_REQUEST['valor']);
                
            }

            if(is_null($cal)){
                print("No available activities");
                
            }
            else{
                print("<TABLE>\n");
                print("<TR>\n");
                print("<TH>FECHA</TH>\n");
                print("<TH>HORA DE INICIO</TH>\n");
                print("<TH>HORA DE FIN</TH>\n");
                print("<TH>TITULO</TH>\n");
                print("</TR>\n");

                foreach ($cal as $res){
                    print("<TR>\n");
                    print("<TD>".$res['fecha']."</TD>\n");
                    print("<TD>".$res['hora_inicio']."</TD>\n");
                    print("<TD>".$res['hora_fin']."</TD>\n");
                    print("<TD><a href=activity.php?val=".$res['id'].">".$res['titulo']."</a></TD>\n");
                    
                    print("</TR>\n");
                }
                print("</TABLE>\n");
            }
        }
        else{
            print("<BR><BR>\n");
            print("<P ALIGN='CENTER'>Acceso no autorizado</P>\n");
            print("<P ALIGN='CENTER'>[<A HREF='login.php' TARGET='_top'>Conectar</A>]</P>\n");
        }
    ?>
</body>
</html>