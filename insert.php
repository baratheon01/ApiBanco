<?php 
require 'conex.php';

$nombre =$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$direccion=$_REQUEST['direccion'];
$telefono=$_REQUEST['telefono'];
$fecha=$_REQUEST['fechaingreso'];

$cone=mysqli_connect($host, $user, $contra);
mysqli_select_db($cone, $bd);
$utf = $cone->query("SET NAMES 'utf8'");

$añadir = mysqli_query($cone, "INSERT INTO cliente (nombre, apellido, direccion, telefono, fechaingreso) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$fecha')");

mysqli_close($cone);


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form></form>
 </body>
 </html>