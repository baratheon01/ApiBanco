<!DOCTYPE html>
<html>
<head>
	<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php 
		function mostrar()
		{
			 $con = mysqli_connect('localhost','root','');
            if (!$con) {
                die('No se puede conectar: ' . mysqli_error($con));
            }

            mysqli_select_db($con,"banco");
            mysqli_set_charset($con,"utf8");
            $sql = mysqli_query($con,"SELECT * FROM cliente WHERE nombre =  '$nombre'");
   				$res = mysqli_query($cone, $sql);
echo "<table>
<tr>
<th>Nombre</th>
<th>Apellido</th>
<th>Direccion</th>

</tr>";
while($row = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['apellido'] . "</td>";
    echo "<td>" . $row['direccion'] . "</td>";
   
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
		}
 ?>
</body>
</html>



