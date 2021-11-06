<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();

	require_once "../inc/brand.php";

	$objBrand = new Brand();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':

			$name = $_POST["txtBrand"];
			$status = $_POST["txtEstado"];

			if(empty($_POST["txtIdBrand"])){

				if($objBrand->Registrar($name, $status)){
					echo "Marca Registrada";
				}else{
					echo "La Marca no ha podido ser registrada.";
				}
			}else{

				$idBrand = $_POST["txtIdBrand"];
				if($objBrand->Modificar($idBrand, $name, $status)){
					echo "Marca Actualizada";
				}else{
					echo "La Marca no ha podido ser Actualizada.";
				}
			}
			break;

		case "delete":

			$id = $_POST["id"];// Llamamos a la variable id del js que mandamos por $.post (Marca.js (Linea 62))
			$result = $objBrand->Eliminar($id);
			if ($result) {
				echo 1;
			} else {
				echo 0;
			}
			break;

		case "list":

			$query_Tipo = $objBrand->Listar();
			$data = Array();
			$i = 1;
			while (!$query_Tipo->EOF) {
				$reg = $query_Tipo->fetchNextObj();
				$data[] = array(
					"id"=>$i,
					"1"=>$reg->name,
					"2"=>$reg->datereg,
					"3"=>$reg->datemod,
					"4"=>$reg->status,
					"5"=>'<button class="btn btn-warning" data-toggle="tooltip" title="Editar" onclick="cargarDataBrand('.$reg->idBrand.',\''.$reg->name.'\',\''.$reg->status.'\')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'.
					'<button class="btn btn-danger" data-toggle="tooltip" title="Eliminar" onclick="eliminarBrand('.$reg->idBrand.')"><i class="fa fa-trash"></i> </button>');
				$i++;
			}
			$results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
			echo json_encode($results);

			break;

	}
