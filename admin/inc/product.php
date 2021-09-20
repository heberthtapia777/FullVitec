<?php
	session_start();
	require "conexion.php";
	date_default_timezone_set("America/La_Paz" );

	class Product{		

		public function Registrar($idCategory,$idBrand,$idUnidad,$product,$model,$summary,$details,$pricePlata,$priceOro,$status){
			global $db;

			$hoy = date("Y-m-d H:i:s");
			//$idEmp = $_SESSION['idempleado'];

			$sql = "INSERT INTO product(idCategory,idBrand,idunidad_medida,name,model,summary,details,pricePlata,priceOro,dateReg,status) VALUES('$idCategory','$idBrand','$idUnidad','$product','$model','$summary','$details','$pricePlata','$priceOro','$hoy','$status')";

			$query = $db->Execute($sql);

			$lastId = $db->insert_Id();
			
			/** ACTUALIZA FOTOS o IMAGENES */

			$strQuery = "SELECT * FROM auximgproduct ";
			$srtQ = $db->Execute($strQuery);

			if ($srtQ){
				while($row = $srtQ->FetchRow()){
					$name = $row['name'];
					$size = $row['size'];

					$queryPhoto = "INSERT INTO photo ( idProduct, name, size ) "; 
					$queryPhoto.= "VALUES ( '".$lastId."', '".$name."', '".$size."' )";

					$db->Execute($queryPhoto);
					
				}
			}		

			$sql = "TRUNCATE TABLE auximgproduct ";
			$db->Execute($sql);

			/** End */

			return $query;

		}

		public function Modificar($idProduct,$category,$brand,$unidad,$product,$model,$summary,$details,$pricePlata,$priceOro,$status){
			global $db;

			$hoy = date("Y-m-d H:i:s");
			//$idEmp = $_SESSION['idempleado'];

			$sql = "UPDATE product set idCategory = '$category', idBrand = '$brand', idunidad_medida = $unidad, name = '$product', model='$model',summary='$summary', details = '$details', pricePlata = '$pricePlata', priceOro = '$priceOro', dateMod='$hoy', status='$status' WHERE idProduct = $idProduct";

			$query = $db->Execute($sql);

			/** Actualiza la imagen o foto en la tabla */			

			$strQuery = "SELECT * FROM auximgproduct ";
			$srtQ = $db->Execute($strQuery);			

			//$txtFoto = 'sin_imagen.jpg';	
			
			if ($srtQ){
				while($row = $srtQ->FetchRow()){
					$name = $row['name'];
					$size = $row['size'];

					$queryPhoto = "INSERT INTO photo ( idProduct, name, size ) "; 
					$queryPhoto.= "VALUES ( '".$idProduct."', '".$name."', '".$size."' )";

					$db->Execute($queryPhoto);					
				}
			}					

			$sql = "TRUNCATE TABLE auximgproduct ";
			$db->Execute($sql);

			/** End */

			return $query;
		}

		public function Eliminar($idProduct){
			global $db;
			$sql = "SET FOREIGN_KEY_CHECKS=0";
			$query = $db->Execute($sql);
			if ($query) {
				$sql = "DELETE FROM product WHERE idProduct = $idProduct";
				$query = $db->Execute($sql);
				return $query;				
			}
		}

		public function Listar(){
			global $db;
			$sql = "SELECT p.idProduct,c.name, b.name, p.name, p.model, p.summary, p.pricePlata, p.priceOro, p.dateReg, p.dateMod FROM product AS p, category AS c, brand AS b WHERE p.idCategory = c.idCategory AND p.idBrand = b.idBrand ORDER BY p.idProduct DESC";
			$query = $db->Execute($sql);
			return $query;
		}

		public function cargaDataEdit($idProduct){
			global $db;
			$sql = "SELECT p.idProduct,c.idCategory, b.idBrand, m.idunidad_medida, p.name, p.model, p.summary, p.details, p.pricePlata, p.priceOro, p.status FROM product AS p, category AS c, brand AS b, unidad_medida AS m WHERE p.idCategory = c.idCategory AND p.idBrand = b.idBrand AND p.idunidad_medida = m.idunidad_medida AND p.idProduct = $idProduct ORDER BY p.idProduct DESC";
			$query = $db->Execute($sql);
			return $query;
		}

		public function LastId(){
			global $db;
			$sql = "SELECT MAX(idProduct) AS id FROM product";
			$query = $db->Execute($sql);
			$reg = $query->FetchRow();
			return $reg[0];
		}

		public function LastPhoto($id){
			global $db;
			$sql = "SELECT name FROM photo WHERE idProduct = $id";
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

	}
