<?php
	session_start();
	require "conexion.php";
	date_default_timezone_set("America/La_Paz" );
	class Empleado{

		public function __construct(){
		}

		public function Registrar($paterno,$materno,$name,$docType,$docNum,$address,$number,$coorX,$coorY,$phone,$celular,$email,$birthDate,$status){
			global $db;

			$hoy = date("Y-m-d H:i:s");
			//$idEmp = $_SESSION['idempleado'];

			$sql = "INSERT INTO empleado(paterno,materno,name,docType,docNum,address,number,coorX,coorY,phone,celular,email,birthDate,status,regDate) VALUES('$paterno','$materno','$name','$docType','$docNum','$address','$number','$coorX','$coorY','$phone','$celular','$email','$birthDate','$status','$hoy')";

			$query = $db->Execute($sql);

			/** Actualiza la imagen o foto en la tabla */

			$idLastEmp = $db->insert_Id();

			$strQuery = "SELECT * FROM auximg ";

			$srtQ = $db->Execute($strQuery);

			$row = $srtQ->FetchRow();

			$txtFoto = 'sin_imagen.jpg';

			if ($row[0]!=''){
				$name = $row['name'];
				$size = $row['size'];

				$strQuery = "UPDATE empleado set photo = '".$name."', size = '".$size."' ";
				$strQuery.= "WHERE idEmpleado = ".$idLastEmp." ";

				$strQuery = $db->Execute($strQuery);

				$txtFoto = $name;
			}

			$txtFoto = $txtFoto.'-'.$idLastEmp;

			$sql = "TRUNCATE TABLE auximg ";
			$strQ = $db->Execute($sql);

			/** End */

			return $txtFoto;

		}

		public function Modificar($idEmpleado,$paterno,$materno,$name,$address,$number,$coorX,$coorY,$phone,$celular,$email,$birthDate,$status){
			global $db;

			$hoy = date("Y-m-d H:i:s");
			//$idEmp = $_SESSION['idempleado'];

			$sql = "UPDATE empleado set paterno = '$paterno',materno = '$materno',name = '$name', address = '$address', number = '$number', coorX = '$coorX', coorY = '$coorY', phone ='$phone', celular ='$celular',email='$email',birthDate='$birthDate',status='$status', regMod='$hoy' WHERE idEmpleado = $idEmpleado";

			$query = $db->Execute($sql);

			/** Actualiza la imagen o foto en la tabla */

			$strQuery = "SELECT * FROM auximg ";
			$srtQ = $db->Execute($strQuery);
			$row = $srtQ->FetchRow();

			$txtFoto = 'sin_imagen.jpg';

			if ($row[0]!=''){
				$name = $row['name'];
				$size = $row['size'];

				$strQuery = "UPDATE empleado set photo = '".$name."', size = '".$size."' ";
				$strQuery.= "WHERE idEmpleado = ".$idEmpleado." ";

				$strQuery = $db->Execute($strQuery);

				$txtFoto = $name;
			}else{
				/** Verifico si cambio de foto */
				$strPhoto = "SELECT photo FROM empleado WHERE idEmpleado = ".$idEmpleado." ";
				$strP = $db->Execute($strPhoto);
				$fila = $strP->FetchRow();

				if ($fila[0] != 'sin_imagen.jpg') {
					$txtFoto = $fila[0];
				}
			}

			$txtFoto = $txtFoto.'-'.$idEmpleado;

			$sql = "TRUNCATE TABLE auximg ";
			$strQ = $db->Execute($sql);

			/** End */

			return $txtFoto;
		}

		public function Eliminar($idEmpleado){
			global $db;
			$sql = "SET FOREIGN_KEY_CHECKS=0";
			$query = $db->Execute($sql);
			if ($query) {
				$sql = "DELETE FROM usuario WHERE idEmpleado = $idEmpleado";
				$query = $db->Execute($sql);
				if ($query) {
					$sql = "DELETE FROM empleado WHERE idEmpleado = $idEmpleado";
					$query = $db->Execute($sql);

					$sqlQuery = "SET FOREIGN_KEY_CHECKS=1";
					$querySql = $db->Execute($sqlQuery);

					return $query;
				}
			}
		}

		public function Listar(){
			global $db;
			$sql = "SELECT * FROM empleado order by idEmpleado DESC";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Reporte(){
			global $conexion;
			$sql = "SELECT * FROM empleado order by apellidos asc";
			$query = $conexion->query($sql);
			return $query;
		}

		public function ListarEmp(){
			global $conexion;
			$sql = "SELECT * FROM empleado AS e, usuario AS u WHERE e.idempleado = u.idempleado AND u.tipo_usuario = 'Vendedor' order by e.idempleado desc";
			$query = $conexion->query($sql);
			return $query;
		}

		public function updatePerfil($id){
			global $conexion;
			$sql = "UPDATE usuario SET mnu_perfil = 0 WHERE idusuario = $id ";
			$query = $conexion->query($sql);
			return $query;
		}

	}
