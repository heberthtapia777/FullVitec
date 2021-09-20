<?php
	session_start();
	require "conexion.php";
	date_default_timezone_set("America/La_Paz" );
	class usuario{

		public function __construct(){
		}

		public function Registrar($idSucursal, $idEmploye, $cboTypeUser, $txtUser, $txtPassword, $status){
			global $db;
			$hoy = date("Y-m-d H:i:s");
			$sql = "INSERT INTO usuario(idSucursal, idEmpleado, userType, login, pass, registerDate, lastVisitDate, status)	VALUES($idSucursal, $idEmploye, '$cboTypeUser', '$txtUser', '$txtPassword', '$hoy', '', '$status')";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Modificar($idUser, $idSucursal, $idEmploye, $cboTypeUser, $txtUser, $txtPassword, $status){
			global $db;
			$sql = "UPDATE usuario set idSucursal = $idSucursal, idEmpleado = $idEmploye, usertype = '$cboTypeUser',login = '$txtUser', pass = '$txtPassword', status = '$status' WHERE idUsuario = $idUser";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Delete($idUser){
			global $db;
			$sql = "DELETE from usuario WHERE idUsuario = $idUser";
			$query = $db->query($sql);
			return $query;
		}

		public function EliminarEvent($idEvent){
			global $db;
			$sql = "DELETE FROM event WHERE id = $idEvent";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Listar(){
			global $db;
			$sql = "SELECT u.*, s.businessName, concat(e.name, ' ', e.paterno, ' ', e.materno) as empleado, e.email from usuario u inner join sucursal s on u.idSucursal = s.idSucursal inner join empleado e on u.idEmpleado = e.idEmpleado where u.status <> 'C'";

			/*$sql = "SELECT u.id, u.name, u.username, u.block, g.title, u.email, u.registerDate, u.lastVisitDate FROM users u INNER JOIN user_usergroup_map m ON u.id = m.user_id INNER JOIN usergroups g ON m.group_id = g.id ORDER BY u.id DESC";*/
			$query = $db->Execute($sql);
			return $query;
		}

		public function status($id, $val){
			global $db;
			$value = ($val == 0) ? 'Activo' : 'Inactivo' ;
			$sql = "UPDATE usuario set status = '$value' WHERE idUsuario = $id";
			$query = $db->Execute($sql);
			return $query;
		}

		public function listaEmpleado(){
			global $db;

			$sql = "SELECT * FROM empleado";
			$query = $db->Execute($sql);
			return $query;
		}

		public function listaTypeUser(){
			global $db;

			$sql = "SELECT * FROM usergroups";
			$query = $db->Execute($sql);
			return $query;
		}

		public function Ingresar_Sistema($user, $pass){
			global $db;
			/*$sql = "SELECT u.*, s.businessName, s.logo AS logo, concat(e.name, ' ', e.apPaterno, ' ', e.apMaterno) AS empleado, e.*, e.status AS superadmin, e.name, e.apPaterno, e.apMaterno, e.birthDate
					FROM usuario u INNER JOIN sucursal s ON u.idSucursal = s.idSucursal
					INNER JOIN empleado e ON u.idEmpleado = e.idEmpleado
					WHERE e.login = '$user' AND e.pass = '$pass' AND u.status <> 'C'";*/
			$sql = "SELECT * FROM usuario AS u, empleado AS e WHERE u.idEmpleado = e.idEmpleado AND u.login = '$user' AND u.pass = '$pass'";

			$query = $db->Execute($sql);
			return $query;
		}

		public function verPerfil($idusuario){
			global $conexion;
			$sql = "SELECT mnu_perfil from usuario WHERE idusuario = $idusuario";
			$query = $conexion->query($sql);
			return $query;
		}

	}
