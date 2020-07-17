<?php
      $buscar = $_POST['b'];
      if(!empty($buscar))
      {
            buscar($buscar);
      }
      function buscar($b) 
      {
            $con = mysqli_connect('localhost','root','');
            if (!$con) {
                die('No se puede conectar: ' . mysqli_error($con));
            }

            mysqli_select_db($con,"banco");
            mysqli_set_charset($con,"utf8");
            $sql = mysqli_query($con,"SELECT * FROM cliente WHERE nombre =  '$b'"); //Igual al texto digitado
            $contar = mysqli_num_rows($sql);
            if($contar == 0)
            {
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else
            {
              echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>";
                echo "<table class='table table-bordered table-hover'> ";
                echo "<tr>";
                echo "<th>"."Nombre"."</th>";
                 echo "<th>"."Apellido"."</th>";
                  echo "<th>"."Direccion"."</th>";
                echo "</tr>";
              while($row=mysqli_fetch_array($sql)){
                echo "<tr>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['apellido']."</td>";
                echo"<td>".$row['direccion']."</td>";
                echo "</tr>";
                //echo $nombre;
            }
        }
  }
?>