<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <title>Document</title>
</head>
<body>
    <?php

        if(isset($_SESSION["usuario_valido"])){
            
            require_once("class/menubar.php");
            require_once("class/calendar_report.php");
            require_once("class/reportmenu.php");

            $obj_menu = new Menubar();
            echo $obj_menu;

            $obj_menu_filter = new ReportMenu();
            echo $obj_menu_filter;

            $val='Reunión';
            $param='tipo_actividad';
            
            if($_SERVER['REQUEST_METHOD']==='POST'){
                if(array_key_exists('buscar_t_actividad',$_POST)){
                    $val=$_REQUEST['tipo_actividad'];
                    $param='tipo_actividad';
                }
                else if(array_key_exists('buscar_m',$_POST)){
                    $val= $_REQUEST['mes'];
                    $param='month(fecha)';
                }
                else if(array_key_exists('buscar_d',$_POST)){
                    $val= $_REQUEST['dia'];
                    $param='day(fecha)';
                }
                else if(array_key_exists('buscar_a',$_POST)){
                    $val= $_REQUEST['año'];
                    $param='year(fecha)';
                }
            }
            $obj_rep = new CalendarReport($param,$val);
            echo $obj_rep;
        

        }else{
        
            header("location:login.php");
        }
        
    ?>
</body>
</html>