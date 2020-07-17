<?php
	if (isset($_GET['docident'])){
		$id=intval($_GET['docident']);

	} else {
		header("location:index.php");
	}
?>
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

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("basedatos.php");
				$cliente= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$nombre = $cliente->sanitize($_POST['nombre']);
					$apellido = $cliente->sanitize($_POST['apellido']);
					$direccion = $cliente->sanitize($_POST['direccion']);
					$telefono = $cliente->sanitize($_POST['telefono']);
					$fecha = $cliente->sanitize($_POST['fechaingreso']);
					$estado = $cliente->sanitize($_POST['estado']);
					//$id=intval($_POST['docident']);
					$res = $cliente->update($nombre, $apellido, $direccion,$telefono, $fecha, $estado ,$id);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_cliente=$cliente->single_record($id);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_cliente->nombre;?>">
					<input type="hidden" name="id_cliente" id="id_cliente" class='form-control' maxlength="100"   value="<?php echo $datos_cliente->id;?>">
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->apellido;?>">
				</div>
				<div class="col-md-12">
					<label>Dirección:</label>
					<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" required><?php echo $datos_cliente->direccion;?></textarea>
				</div>
				<div class="col-md-6">
					<label>Teléfono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->telefono;?>">
				</div>
				<div class="col-md-6">
					<label>Fecha:</label>
					<input type="text" name="fechaingreso" id="fechaingreso" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->fechaingreso;?>">
				
				</div>
				<div class="col-md-6">
					<label>Estado</label>
					<input type="text" name="estado" id="estado" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->estado;?>">
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            