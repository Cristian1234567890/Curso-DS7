<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <LINK rel="stylesheet" type="text/css" href="CSS/estilos.css">
    <title>Document</title>
</head>
<body>
    
    <?php

        require_once("class/menubar.php");

        $obj_menu = new Menubar();
        echo $obj_menu;

        require_once("class/visual_calendar.php");
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $curr_m = $_REQUEST['mes'];
            $curr_y= $_REQUEST['año'];
            $curr_d= date("d");
            $obj_n = new VisualCalendar($curr_m,$curr_d,$curr_y);
            echo $obj_n;
        }
        else{
            $curr_d= date("d");
            $curr_m= date("m");
            $curr_y= date("y");
            $obj = new VisualCalendar($curr_m,$curr_d,$curr_y);

            echo $obj;
        }
        
            
           
        

        
    ?>

</body>
</html>