<?php	
	session_start();
	require_once "../inc/employe.php";
	$objEmpleado = new Empleado();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':

			$data = stripslashes($_POST['res']);

			$data = json_decode($data);

			$paterno			= $data->txtApPaterno;
			$materno	      	= $data->txtApMaterno;
			$name           	= $data->txtNombre;
			$docType		  	= $data->cboTipo_Documento;
			$docNum	    		= $data->txtNum_Documento;
			$address        	= $data->txtDireccion;
			$number				= $data->txtNumber;
			$coorX            	= $data->cx;
			$coorY            	= $data->cy;
			$phone         		= $data->txtTelefono;
			$celular         	= $data->txtCelular;
			$email            	= $data->txtEmail;
			$birthDate 			= $data->txtFecha_Nacimiento;
			$status           	= $data->txtEstado;

			$data->txtFoto = '';


			if(empty($data->txtIdEmpleado)){
				$txtFoto = $objEmpleado->Registrar($paterno,$materno,$name,$docType,$docNum,$address,$number,$coorX,$coorY,$phone,$celular,$email,$birthDate,$status);
					$rev = explode('-',$txtFoto);
					$data->txtFoto = $rev[0];
					$data->lastId = $rev[1];
				if($txtFoto){
					echo json_encode($data);;
				}else{
					echo 0;
				}
			}else{
				$idEmpleado = $data->txtIdEmpleado;
				$txtFoto = $objEmpleado->Modificar($idEmpleado,$paterno,$materno,$name,$address,$number,$coorX,$coorY,$phone,$celular,$email,$birthDate,$status);
					$rev = explode('-',$txtFoto);
					$data->txtFoto = $rev[0];
					$data->lastId = $rev[1];
				if($txtFoto){
					echo json_encode($data);;
				}else{
					echo 0;
				}
			}

			break;

		case "delete":

			$id = $_POST["id"];// Llamamos a la variable id del js que mandamos por $.post (Categoria.js (Linea 62))
			$result = $objEmpleado->Eliminar($id);
			if ($result) {
				echo 0;
			} else {
				echo 1;
			}
			break;

		case "list":
			$query_Tipo = $objEmpleado->Listar();
			$data= Array();
            $i = 1;
     		while ($reg = $query_Tipo->FetchRow()){
				if (empty($reg['photo'])) {
					$reg['photo'] = 'sin_imagen.jpg';
			}

				//$img = '<a href="../../modulo/empleado/uploads/files/'.$reg['photo'].'" data-lightbox="image-'.$reg["idEmpleado"].'" ><img src="../../vendors/resizer/resizer.php?file=../../modulo/empleado/uploads/files/thumbnail/'.$reg['photo'].'&width=100&height=70&action=resize&quality=100"></a>';

				$img = '<a href="../../modulo/empleado/uploads/files/'.$reg['photo'].'" data-lightbox="image-'.$reg["idEmpleado"].'" ><img src="../../modulo/empleado/uploads/files/thumbnail/'.$reg['photo'].'"></a>';

				//$img = $thumb;

     			$data[] = array(
					"0"=>$i,
					"1"=>$reg['paterno'].'&nbsp;'.$reg['materno'].'&nbsp;'.$reg['name'],
					"2"=>$reg['docType'],
					"3"=>$reg['docNum'],
					"4"=>$reg['email'],
					"5"=>$reg['celular'],
					"6"=>$img,
					"7"=>'<button id="'.$reg['idEmpleado'].'" class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataEmpleado('.$reg['idEmpleado'].',\''.$reg['paterno'].'\',\''.$reg['materno'].'\',\''.$reg['name'].'\',\''.$reg['docType'].'\',\''.$reg['docNum'].'\',\''.$reg['address'].'\',\''.$reg['number'].'\',\''.$reg['coorX'].'\',\''.$reg['coorY'].'\',\''.$reg['phone'].'\',\''.$reg['celular'].'\',\''.$reg['email'].'\',\''.$reg['birthDate'].'\',\''.$reg['status'].'\')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'.
					'<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="eliminarEmpleado('.$reg['idEmpleado'].')"><i class="fas fa-trash"></i> </button>');
				$i++;
			}
			$results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
			echo json_encode($results);

			break;

		case "listTipo_DocumentoPersona":
		        require_once "../model/Tipo_Documento.php";

		        $objTipo_Documento = new Tipo_Documento();

		        $query_tipo_Documento = $objTipo_Documento->VerTipo_Documento_Persona();

		        while ($reg = $query_tipo_Documento->fetch_object()) {
		            echo '<option value=' . $reg->nombre . '>' . $reg->nombre . '</option>';
		        }

		    break;

		case "listEmpleado":
	        require_once "../model/Empleado.php";

	        $objEmpleado = new Empleado();

	        $query_empleado = $objEmpleado->ListarEmp();

	        echo '<option value="0">TODOS</option>';

	        while ($reg = $query_empleado->fetch_object()) {
	            echo '<option value=' . $reg->idempleado . '>' . $reg->nombre . ' ' . $reg->apellidos . '</option>';
	        }

	        break;

	}
