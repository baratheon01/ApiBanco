<?php
	 class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="banco";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function create($nombre,$apellido,$direccion,$telefono,$fecha, $estado){
			$sql = "INSERT INTO `cliente` (nombre, apellido, direccion, telefono, fechaingreso, estado) VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$fecha', '$estado')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT * FROM cliente";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id){
			$sql = "SELECT * FROM cliente where docident='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($nombre,$apellido,$direccion,$telefono,$fecha,$estado, $id){
			$sql = "UPDATE cliente SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', fechaingreso ='$fecha', estado='$estado'  WHERE docident='$id'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM cliente WHERE docident='$id'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
?>	