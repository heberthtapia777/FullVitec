<?php
	require "conexion.php";
	date_default_timezone_set("America/La_Paz" );
	class Category{

		public function __construct(){
		}

		public function Registrar($name, $status){
			global $db;
			$hoy = date("Y-m-d H:i:s");
			$sql = "INSERT INTO category(name, datereg, status) VALUES('$name', '$hoy', '$status')";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Modificar($idCategory, $name, $status){
			global $db;
			$hoy = date("Y-m-d H:i:s");
			$sql = "UPDATE category set name = '$name', status = '$status', datemod = '$hoy' WHERE idCategory = $idCategory";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Eliminar($idCategory){
			global $db;
			$sql = "DELETE FROM category WHERE idCategory = $idCategory";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Listar(){
			global $db;
			$sql = "SELECT * FROM category order by idCategory desc";
			$query = $db->Execute($sql);
			return $query;
		}

		public function ListarNum(){
			global $db;
			$sql = "SELECT * FROM product AS p, category AS c order by idCategory desc";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Reporte(){
			global $db;
			$sql = "SELECT * FROM categoria order by nombre asc";
			$query = $db->Execute($sql);
			return $query;
		}

		public function ListarUM(){
			global $db;
			$sql = "SELECT * FROM unidad_medida";
			$query = $db->Execute($sql);
			return $query;
		}

		public function ListarSucursal(){
			global $db;
			$sql = "SELECT * FROM sucursal";
			$query = $db->Execute($sql);
			return $query;
		}

		public function ListarEmpleado(){
			global $db;
			$sql = "SELECT * FROM empleado";
			$query = $db->Execute($sql);
			return $query;
		}

		public function VerNoticiaCategoria(){
			global $db;
			$sql = "select * from categoria
	where nombre = 'Noticias' or nombre = 'Noticia' or nombre = 'noticia' or nombre = 'noticias'";
			$query = $db->Execute($sql);
			return $query;
		}

	}
