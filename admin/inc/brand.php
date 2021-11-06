<?php
	require "conexion.php";

	class Brand{

		public function __construct(){
		}

		public function Registrar($name, $status){
			global $db;
			$hoy = date("Y-m-d H:i:s");
			$sql = "INSERT INTO brand(name, datereg, status) VALUES('$name', '$hoy', '$status')";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Modificar($idBrand, $name, $status){
			global $db;
			$hoy = date("Y-m-d H:i:s");
			$sql = "UPDATE brand set name = '$name', status = '$status', datemod = '$hoy' WHERE idBrand = $idBrand";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Eliminar($idBrand){
			global $db;
			$sql = "DELETE FROM brand WHERE idBrand = $idBrand";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Listar(){
			global $db;
			$sql = "SELECT * FROM brand order by idBrand desc";
			$query = $db->Execute($sql);
			return $query;
		}


	}
