<?php
	require "conexion.php";

	class Images{

		public function __construct(){
		}

		public function Listar($idGalery){
			global $db;
			$sql = "SELECT name FROM images WHERE idGalery = $idGalery ORDER BY idImages DESC";
			$query = $db->Execute($sql);
			return $query;
		}

	}
