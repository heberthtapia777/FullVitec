<?php
	session_start();
	require_once "../inc/users.php";
	$objUsers = new usuario();
	switch ($_GET["op"]) {

		case 'saveOrUpdate':

			$data = stripslashes($_POST['res']);
			$data = json_decode($data);

			$idSucursal		= 1;
			//$idUser			= $data->txtIdUser;
			$idEmploye	    = $data->txtIdEmploye;
			$cboTypeUser    = $data->cboTypeUser;
			$txtUser		= $data->txtUser;
			$txtPassword	= md5($data->txtPassword);
			$status         = $data->txtStatus;

			if(empty($data->txtIdUser)){
				if($objUsers->Registrar($idSucursal, $idEmploye, $cboTypeUser, $txtUser, $txtPassword, $status)){
					echo json_encode($data);
				}else{
					echo 0;
				}
			}else{
				$idUser = $data->txtIdUser;
				if($objUsers->Modificar($idUser, $idSucursal, $idEmploye, $cboTypeUser, $txtUser, $txtPassword, $status)){
					echo json_encode($data);
				}else{
					echo 0;
				}
			}

			break;

		case "delete":

			$id = $_POST["id"];
			$result = $objUsers->Delete($id);
			if ($result) {
				echo "Eliminado Exitosamente";
			} else {
				echo "No fue Eliminado";
			}
			break;

		case "deleteEvent":

			$id = $_POST["id"];// Llamamos a la variable id del js que mandamos por $.post (Categoria.js (Linea 62))
			$result = $objUsers->EliminarEvent($id);
			if ($result) {
				echo 0;
			} else {
				echo 1;
			}
			break;

		case "list":
			$query_Tipo = $objUsers->Listar();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->FetchRow()) {
				if($reg['status'] == 'Activo')
					$hab = '<a href="#" id="'.$reg["idUsuario"].'" onclick="status('.$reg["idUsuario"].', 1)"><span class="badge bg-success"><i class="fas fa-check-circle"></i></span></a>';
				else
					$hab = '<a href="#" id="'.$reg["idUsuario"].'" onclick="status('.$reg["idUsuario"].', 0)"><span class="badge bg-danger"><i class="fas fa-times-circle"></i></span></a>';
     			$data[] = array(
     				"0"=>$i,
                    "1"=>utf8_encode($reg['empleado']),
                    "2"=>utf8_encode($reg['login']),
                    "3"=>$hab,
					"4"=>utf8_encode($reg['userType']),
					"5"=>utf8_encode($reg['email']),
					"6"=>utf8_encode($reg['registerDate']),
					"7"=>utf8_encode($reg['lastVisitDate']),
                    "8"=>'<button class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataUsuario('.$reg['idUsuario'].',\''.$reg['idSucursal'].'\',\''.$reg['empleado'].'\',\''.$reg['idEmpleado'].'\',\''.$reg['userType'].'\',\''.$reg['email'].'\',\''.$reg['login'].'\')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'.
                    '<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="deleteUser('.$reg['idUsuario'].')"><i class="fas fa-trash"></i> </button>');
                $i++;
			}
            $results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
			"aaData"=>$data);
			echo json_encode($results);

			break;

		case "listSucursal":
	        require_once "../model/Categoria.php";

	        $objCategoria = new Categoria();

	        $query = $objCategoria->ListarSucursal();

	        while ($reg = $query->fetch_object()) {
	            echo '<option value=' . $reg->idsucursal . '>' . $reg->razon_social . '</option>';
	        }

	        break;

		case "listEmploye":

			$query_Tipo = $objUsers->listaEmpleado();
			$data = Array();
            $i = 1;
     		while ($reg = $query_Tipo->FetchRow()) {
     			$data[] = array(
     				"0"=>'<input type="radio" name="optEmploye" id="optEmploye" data-employe="'.$reg['name'].' '.$reg['paterno'].' '.$reg['materno'].'" value="'.$reg['idEmpleado'].'" />',
                    "1"=>$i,
                    "2"=>$reg['paterno'].' '.$reg['materno'],
					"3"=>$reg['name'],
					"4"=>$reg['docType'],
					"5"=>$reg['docNum'],
					"6"=>$reg['email'],
					);
                $i++;
			}
            $results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
			"aaData"=>$data);
			echo json_encode($results);

			break;

		case "status":
			$id = $_POST['id'];
			$val = $_POST['val'];

			$query = $objUsers->status($id, $val);

			if($query)
				echo 1;
			else
				echo 0;

			break;

		/*case "listTypeUser":

			$query_Tipo = $objUsers->listaTypeUser();

			echo '<option value=""></option>';

     		while ($reg = $query_Tipo->FetchRow()) {
				echo '<option value=' . $reg['id'] . '>' . $reg['title'] . '</option>';
			}

			break;*/

	    case "ingresarSistema":

	    	$data = stripslashes($_POST['res']);

	    	$data = json_decode($data);

	    	$user = $data->userName;
			$pass = $data->password;

			$query = $objUsers->Ingresar_Sistema($user, md5($pass));
			$array = $query->FetchRow();

			if(isset($array)){
				$_SESSION["idUser"]   = $array['id'];
				$_SESSION["nameUser"]  = $array['name'];
			}

			echo json_encode($array);

			if(isset($array)){
				$_SESSION["idUsuario"]            = $array['idUsuario'];
				$_SESSION["idEmpleado"]           = $array['idEmpleado'];
				$_SESSION["empleado"]             = $array['empleado'];
				$_SESSION["name"]     		      = $array['name'];
				$_SESSION["apPaterno"]            = $array['apPaterno'];
				$_SESSION["apMaterno"]            = $array['apMaterno'];
				$_SESSION["docType"]	     	  = $array['docType']	;
				$_SESSION["docNum"]   	      	  = $array['docNum']	;
				$_SESSION["userType"]         	  = $array['userType'];
				$_SESSION["address"]    	      = $array['address'];
				$_SESSION["number"] 	   	      = $array['number'];
				$_SESSION["phone"]   	          = $array['phone'];
				$_SESSION["celular"]   	          = $array['celular'];
				$_SESSION["photo"]                = $array['photo'];
				$_SESSION["logo"]                 = $array['logo'];
				$_SESSION["email"]                = $array['email'];
				$_SESSION["login"]                = $array['login'];
				$_SESSION["cx"] 	              = $array['coorX'];
				$_SESSION["cy"] 	              = $array['coorY'];
				$_SESSION["birthDate"] 	          = $array['birthDate'];
				$_SESSION["businessName"]         = $array['businessName'];
				$_SESSION["mnu_almacen"]          = $array['mnu_almacen'];
				$_SESSION["mnu_compras"]          = $array['mnu_compras'];
				$_SESSION["mnu_ventas"]           = $array['mnu_ventas'];
				$_SESSION["mnu_mantenimiento"]    = $array['mnu_mantenimiento'];
				$_SESSION["mnu_seguridad"]        = $array['mnu_seguridad'];
				$_SESSION["mnu_consulta_compras"] = $array['mnu_consulta_compras'];
				$_SESSION["mnu_consulta_ventas"]  = $array['mnu_consulta_ventas'];
				$_SESSION["mnu_admin"]            = $array['mnu_admin'];
				$_SESSION["superadmin"]           = $array['superadmin'];
			}
			break;

		case "IngresarPanel" :
				$_SESSION["idusuario"]            = $_POST["idusuario"];
				$_SESSION["idsucursal"]           = $_POST["idsucursal"];
				$_SESSION["idempleado"]           = $_POST["idempleado"];
				$_SESSION["superadmin"]           = "A";
				$_SESSION["empleado"]             = $_POST["empleado"];
				$_SESSION["tipo_documento"]       = $_POST["tipo_documento"];
				$_SESSION["userType"]         	  = $_POST["userType"];
				$_SESSION["num_documento"]        = $_POST["num_documento"];
				$_SESSION["direccion"]            = $_POST["direccion"];
				$_SESSION["telefono"]             = $_POST["telefono"];
				$_SESSION["foto"]                 = $_POST["foto"];
				$_SESSION["logo"]                 = $_POST["logo"];
				$_SESSION["email"]                = $_POST["email"];
				$_SESSION["login"]                = $_POST["login"];
				$_SESSION["sucursal"]             = $_POST["razon_social"];
				$_SESSION["mnu_almacen"]          = $_POST["mnu_almacen"];
				$_SESSION["mnu_compras"]          = $_POST["mnu_compras"];
				$_SESSION["mnu_ventas"]           = $_POST["mnu_ventas"];
				$_SESSION["mnu_mantenimiento"]    = $_POST["mnu_mantenimiento"];
				$_SESSION["mnu_seguridad"]        = $_POST["mnu_seguridad"];
				$_SESSION["mnu_consulta_compras"] = $_POST["mnu_consulta_compras"];
				$_SESSION["mnu_consulta_ventas"]  = $_POST["mnu_consulta_ventas"];
				$_SESSION["mnu_admin"]            = $_POST["mnu_admin"];
		break;

		case "IngresarPanelSuperAdmin" :
				$_SESSION["idusuario"]            = $_POST["idusuario"];
				$_SESSION["idsucursal"]           = $_POST["idsucursal"];
				$_SESSION["idempleado"]           = $_POST["idempleado"];
				$_SESSION["superadmin"]           = $_POST["estadoAdmin"];
				$_SESSION["empleado"]             = $_POST["empleado"];
				$_SESSION["tipo_documento"]       = $_POST["tipo_documento"];
				$_SESSION["userType"]        	  = $_POST["userType"];
				$_SESSION["num_documento"]        = $_POST["num_documento"];
				$_SESSION["direccion"]            = $_POST["direccion"];
				$_SESSION["telefono"]             = $_POST["telefono"];
				$_SESSION["foto"]                 = $_POST["foto"];
				$_SESSION["logo"]                 = $_POST["logo"];
				$_SESSION["email"]                = $_POST["email"];
				$_SESSION["login"]                = $_POST["login"];
				$_SESSION["sucursal"]             = $_POST["razon_social"];
				$_SESSION["mnu_almacen"]          = $_POST["mnu_almacen"];
				$_SESSION["mnu_compras"]          = $_POST["mnu_compras"];
				$_SESSION["mnu_ventas"]           = $_POST["mnu_ventas"];
				$_SESSION["mnu_mantenimiento"]    = $_POST["mnu_mantenimiento"];
				$_SESSION["mnu_seguridad"]        = $_POST["mnu_seguridad"];
				$_SESSION["mnu_consulta_compras"] = $_POST["mnu_consulta_compras"];
				$_SESSION["mnu_consulta_ventas"]  = $_POST["mnu_consulta_ventas"];
				$_SESSION["mnu_admin"]            = $_POST["mnu_admin"];
		break;

		case "verPerfil":
	        require_once "../model/usuario.php";

	        $objCategoria = new usuario();

	        $query = $objUsers->verPerfil($_POST['id']);

	        $reg = $query->fetch_object();

	        echo $reg->mnu_perfil;

	        break;

		case "Salir":
			session_unset();
			session_destroy();
			header("Location:../");
			break;


	}
