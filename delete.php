<?php 
if (isset($_GET['docident']))
{
	include('basedatos.php');
	$cliente = new Database();
	$id=intval($_GET['docident']);
	$res = $cliente->delete($id);
	if($res)
		{
		header('location: index.php');
		}
	else
		{
		echo "Error al eliminar el registro";
		}
}
?>