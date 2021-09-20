<?php
	require "conexion.php";

	class UnidadMedida{
	
		
		public function __construct(){
		}

		public function Registrar($nombre){
			global $conexion;
			$sql = "INSERT INTO categoria(nombre, estado)
						VALUES('$nombre', 'A')";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Modificar($idcategoria, $nombre){
			global $conexion;
			$sql = "UPDATE categoria set nombre = '$nombre'
						WHERE idcategoria = $idcategoria";
			$query = $conexion->query($sql);
			return $query;
		}
		
		public function Eliminar($idcategoria){
			global $conexion;
			$sql = "DELETE FROM category WHERE idcategoria = $idcategoria";
			$query = $conexion->query($sql);
			return $query;
		}

		public function Listar(){
			global $db;
			$sql = "SELECT * FROM unidad_medida order by idunidad_medida desc";
			$query = $db->Execute($sql);
			return $query;
		}
		public function Reporte(){
			global $conexion;
			$sql = "SELECT * FROM categoria order by nombre asc";
			$query = $conexion->query($sql);
			return $query;
		}

		public function ListarUM(){
			global $conexion;
			$sql = "SELECT * FROM unidad_medida";
			$query = $conexion->query($sql);
			return $query;
		}

		public function ListarSucursal(){
			global $conexion;
			$sql = "SELECT * FROM sucursal";
			$query = $conexion->query($sql);
			return $query;
		}

		public function ListarEmpleado(){
			global $conexion;
			$sql = "SELECT * FROM empleado";
			$query = $conexion->query($sql);
			return $query;
		}

		public function VerNoticiaCategoria(){
			global $conexion;
			$sql = "select * from categoria
	where nombre = 'Noticias' or nombre = 'Noticia' or nombre = 'noticia' or nombre = 'noticias'";
			$query = $conexion->query($sql);
			return $query;
		}

	}
