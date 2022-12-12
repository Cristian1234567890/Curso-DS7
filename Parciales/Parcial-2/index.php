<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width   , initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css"> 
    <title>Document</title>
</head>
<body>
    <div class="titulo">
        <h1>Sumatoria</h1>
    </div><br>

    <form name="f" action="" method="POST">
    <div>
      <label for="fname">Insertar N: </label><br> <br> 
      <input type="number" id="fname" placeholder="N" name="variable"><br> <br> 
      <input type="submit" value="Registrar sumatorio"/> <br> <br> 
    </div>
    </form>

    <form name="f" action="" method="POST">
    <div>
      <label for="fname">El nuevo N: </label><br> <br> 
      <input type="number" id="fname" placeholder="ID" name="ID"><br> <br> 
      <input type="number" id="fname" placeholder="N" name="NNuevo"><br> <br>   
      <input type="submit"  value="Modificar sumatoria"/> <br> <br> 
    </div>
    </form>
    

    <table class="table">
        <tr>
          <th>ID</th>
          <th>N</th>
          <th>Factorial</th>
          <th>Sumatoria</th>
        </tr>
        <?php
            require_once("class/sumatoria.php");
            $obj_cal= new sumatoria();

            if(isset($_POST['variable']) && is_numeric($_POST['variable']))
            {
              $cal = $obj_cal->calcular($_POST['variable']);
              if($cal > 0){
                foreach ($cal as $res){
                  
                  echo "<tr><td>".$res['ID']."</td>";
                  echo "<td>".$res['N']."</td>";
                  echo "<td>".$res['Factorial']."</td>";
                  echo "<td>".$res['Sumatoria']."</td></tr>";
                }
              }
            } elseif (isset($_POST['NNuevo']) && is_numeric($_POST['NNuevo']) && isset($_POST['ID']) && is_numeric($_POST['ID'])){
              $cal = $obj_cal->actualizar_sumatorias($_POST['ID'],$_POST['NNuevo']);
              if($cal > 0){
                foreach ($cal as $res){
                  
                  echo "<tr><td>".$res['ID']."</td>";
                  echo "<td>".$res['N']."</td>";
                  echo "<td>".$res['Factorial']."</td>";
                  echo "<td>".$res['Sumatoria']."</td></tr>";
                }
              }
            }
        ?>
      </table>
    
</body>
</html>