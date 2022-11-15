<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14.1- Logout al sitio de Noticias</title>
    <LINK REL ="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</head>
<body>
    <?php
      if(isset($_SESSION["usuario_valido"])){
        session_destroy();
        print("<BR><BR><P ALIGN='CENTER'>Conexión Finalizada!</P>\n");
        print("<P ALIGN ='CENTER'> [<A HREF='login.php'>Conectar</A>]</P>\n");
      }
      else{
        print("<BR><BR>\n");
        print("<P ALIGN='CENTER'>No existe una conexión activa</P>\n");
        print("<P ALIGN='CENTER'>[<A HREF='login.php'>Conectar</A>]</P>\n");
      }
    ?>
    
</body>
</html>