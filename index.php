<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function confirmacion(idreg)
{
    if(confirm('Esta seguro que desea eliminar el registro?'))
    {
    location.href='delete.php?docident='+idreg;
    }
}
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Clientes</b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar cliente</a>
                         <a href="buscar.html" class="btn btn-info add-new"><i class="fa fa-plus"></i> Buscador</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <?php 
                include ('basedatos.php');
                $cliente = new Database();
                $listado=$cliente->read();
                ?>
                <tbody>
                <?php 
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->docident;
                        $nombre=$row->nombre." ".$row->apellido;
                        $direccion=$row->direccion;
                        $telefono=$row->telefono;
                        $fecha=$row->fechaingreso;
                        $estado=$row->estado;
                ?>
                    <tr>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $fecha;?></td>
                        <td><?php echo $estado;?></td>
                        <td>
                             <a href="update.php?docident=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <!-- <a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a> -->
                            <a href="#" onClick="confirmacion(<?php echo $id; ?>)" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
            </td>
            </tr>
            <?php 
                };
             ?>
            </tbody>
            </table>
        </div>
    </div>     
</body>
</html>
