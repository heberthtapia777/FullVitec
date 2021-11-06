<?php
	session_start();
	require "conexion.php";
	date_default_timezone_set("America/La_Paz" );

	class Galery{

		public function Registrar($idCategory,$title,$status){
			global $db;

			$hoy = date("Y-m-d H:i:s");
			//$idEmp = $_SESSION['idempleado'];

			$sql = "INSERT INTO galery(idCategory,name,dateReg,status) VALUES('$idCategory','$title','$hoy','$status')";

			$query = $db->Execute($sql);

			$lastId = $db->insert_Id();

			/** ACTUALIZA FOTOS o IMAGENES */

			$strQuery = "SELECT * FROM auximg ";
			$srtQ = $db->Execute($strQuery);

			if ($srtQ){
				while($row = $srtQ->FetchRow()){
					$name = $row['name'];
					$size = $row['size'];

					$queryPhoto = "INSERT INTO images ( idGalery, name, size ) ";
					$queryPhoto.= "VALUES ( '".$lastId."', '".$name."', '".$size."' )";

					$db->Execute($queryPhoto);

				}
			}

			$sql = "TRUNCATE TABLE auximg ";
			$db->Execute($sql);

			/** End */

			return $query;

		}

		public function Modificar($idGalery,$idCategory,$title,$status){
			global $db;

			$hoy = date("Y-m-d H:i:s");
			//$idEmp = $_SESSION['idempleado'];

			$sql = "UPDATE galery set idCategory = '$idCategory', name = '$title', dateMod='$hoy', status='$status' WHERE idGalery = $idGalery";

			$query = $db->Execute($sql);

			/** Actualiza la imagen o foto en la tabla */

			$strQuery = "SELECT * FROM auximg ";
			$srtQ = $db->Execute($strQuery);

			//$txtFoto = 'sin_imagen.jpg';

			if ($srtQ){
				while($row = $srtQ->FetchRow()){
					$name = $row['name'];
					$size = $row['size'];

					$queryPhoto = "INSERT INTO images ( idGalery, name, size ) ";
					$queryPhoto.= "VALUES ( '".$idGalery."', '".$name."', '".$size."' )";

					$db->Execute($queryPhoto);
				}
			}

			$sql = "TRUNCATE TABLE auximg ";
			$db->Execute($sql);

			/** End */

			return $query;
		}

		public function Eliminar($idGalery){
			global $db;
			$sql = "SET FOREIGN_KEY_CHECKS=0";
			$query = $db->Execute($sql);
			if ($query) {
				$sql = "DELETE FROM galery WHERE idGalery = $idGalery";
				$query = $db->Execute($sql);
				return $query;
			}
		}

		public function Listar(){
			global $db;
			$sql = "SELECT g.idGalery,c.name, g.name, g.dateReg, g.dateMod FROM galery AS g, category AS c WHERE g.idCategory = c.idCategory ORDER BY g.idGalery DESC";
			$query = $db->Execute($sql);
			return $query;
		}

		public function cargaDataEdit($idGalery){
			global $db;
			$sql = "SELECT g.idGalery,c.idCategory, g.name, g.status FROM galery AS g, category AS c WHERE g.idCategory = c.idCategory AND g.idGalery = $idGalery ";
			$query = $db->Execute($sql);
			return $query;
		}

		public function LastId(){
			global $db;
			$sql = "SELECT MAX(idGalery) AS id FROM galery";
			$query = $db->Execute($sql);
			$reg = $query->FetchRow();
			return $reg[0];
		}

		public function LastPhoto($id){
			global $db;
			$sql = "SELECT name FROM images WHERE idGalery = $id";
			$query = $db->Execute($sql);
			$reg = $query->FetchRow();
			return $reg[0];
		}

		public function NameCategory($id){
			global $db;
			$sql = "SELECT name FROM category WHERE idCategory = $id";
			$query = $db->Execute($sql);
			$reg = $query->FetchRow();
			return $reg[0];
		}

		public function NameBrand($id){
			global $db;
			$sql = "SELECT name FROM brand WHERE idBrand = $id";
			$query = $db->Execute($sql);
			$reg = $query->FetchRow();
			return $reg[0];
		}

		public function detailSingle($id){
			global $db;
			$sql = "SELECT p.idProduct,c.name, b.name, p.name, p.model, p.summary, p.details, p.pricePlata, p.priceOro, p.dateReg, p.dateMod, p.status FROM product AS p, category AS c, brand AS b WHERE p.idCategory = c.idCategory AND p.idBrand = b.idBrand AND p.idProduct = $id";
			$query = $db->Execute($sql);
			return $query;
		}

		public function photoProduct($id){
			global $db;
			$sql = "SELECT name FROM photo WHERE idProduct = $id";
			$query = $db->Execute($sql);
			return $query;
		}

		public function listarImages(){
			global $db;
			$sql = "SELECT c.idCategory, g.idGalery,c.name AS category, g.name AS galery, g.dateReg, g.dateMod, i.name AS images
					FROM galery AS g, category AS c, images AS i
					WHERE g.idCategory = c.idCategory
					AND g.idGalery = i.idGalery
					GROUP BY g.idGalery
					ORDER BY g.idGalery DESC";
			$query = $db->Execute($sql);
			return $query;
		}

		public function listarCategory(){
			global $db;
			$sql = "SELECT c.idCategory AS idcategory, g.idGalery AS idgalery, c.name AS category, g.name AS galery, g.dateReg, g.dateMod, i.name AS images
					FROM galery AS g, category AS c, images AS i
					WHERE g.idCategory = c.idCategory
					AND g.idGalery = i.idGalery
					GROUP BY g.idCategory
					ORDER BY g.idGalery DESC";
			$query = $db->Execute($sql);
			return $query;
		}

		public function listarImagesDet(){
			global $db;
			$idGalery = $_GET['idGalery'];
			$sql = "SELECT c.idCategory, g.idGalery,c.name AS category, g.name AS galery, g.dateReg, g.dateMod, i.name AS images
					FROM galery AS g, category AS c, images AS i
					WHERE g.idCategory = c.idCategory
					AND g.idGalery = i.idGalery
					AND g.idGalery = $idGalery
 					ORDER BY g.idGalery DESC";
			$query = $db->Execute($sql);
			return $query;
		}

	}
