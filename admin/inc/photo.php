<?php
	require "conexion.php";

	class Photo{
		
		public function __construct(){
		}
		
		public function Listar($idProduct){
			global $db;
			$sql = "SELECT name FROM photo WHERE idProduct = $idProduct ORDER BY idPhoto DESC";
			$query = $db->Execute($sql);
			return $query;
		}		

	}
