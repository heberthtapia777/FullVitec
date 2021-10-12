<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();

	require_once "../inc/product.php";

	$objProduct = new Product();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':

			$data = $_POST['res'];

			$data = json_decode($data);

			$category			= $data->cboCategory;
			$brand	      		= $data->cboBrand;
			$unidad           	= $data->cboUnidadMedida;
			$product		  	= $data->txtProduct;
			$model	    		= $data->txtModel;
			$summary        	= $data->txtSummary;
			$details			= $data->txtDetails;
			$pricePlata   		= $data->txtPricePlata;
			$priceOro         	= $data->txtPriceOro;
			$status           	= $data->txtEstado;

			$data->txtFoto = '';

			if(empty($data->txtIdProduct)){
				if($objProduct->Registrar($category,$brand,$unidad,$product,$model,$summary,$details,$pricePlata,$priceOro,$status)){

					$lastId = $objProduct->LastId();
					$txtFoto = $objProduct->LastPhoto($lastId);

					$data->txtFoto = $txtFoto;
					$data->lastId = $lastId;
					$data->nameCategory = $objProduct->NameCategory($category);
					$data->nameBrand 	= $objProduct->NameBrand($brand);

					echo json_encode($data);
				}else{
					echo 0;
				}
			}else{
				$idProduct = $data->txtIdProduct;
				if($objProduct->Modificar($idProduct,$category,$brand,$unidad,$product,$model,$summary,$details,$pricePlata,$priceOro,$status)){

					$txtFoto = $objProduct->LastPhoto($idProduct);

					$data->txtFoto = $txtFoto;
					$data->lastId = $idProduct;
					$data->nameCategory = $objProduct->NameCategory($category);
					$data->nameBrand 	= $objProduct->NameBrand($brand);

					echo json_encode($data);
				}else{
					echo 0;
				}
			}

			break;

		case "delete":

			$id = $_POST["id"];// Llamamos a la variable id del js que mandamos por $.post (Categoria.js (Linea 62))
			$result = $objProduct->Eliminar($id);
			if ($result) {
				echo 0;
			} else {
				echo 1;
			}
			break;

		case "list":
			$query_Tipo = $objProduct->Listar();
			$data= Array();
            $i = 1;
     		while ($reg = $query_Tipo->FetchRow()) {

				require_once "../inc/photo.php";

				$objPhoto = new Photo();

				$queryPhoto = $objPhoto->Listar($reg[0]);

				$row = $queryPhoto->FetchRow();

				if (empty($row[0])) {
					$row[0] = 'sin_imagen.jpg';
				}

				$img = '<a href="../../modulo/product/uploads/files/'.$row[0].'" data-lightbox="image-'.$reg["idProduct"].'" ><img src="../../modulo/product/uploads/files/thumbnail/'.$row[0].'"></a>';

				$summary = (mb_substr($reg[5], 0, 70, 'UTF-8').'...');

     			$data[] = array(
					"0"=>$i,
					"1"=>$reg[1],
					"2"=>$reg[2],
					"3"=>$reg[3],
					"4"=>$reg[4],
					"5"=>$summary,
					"6"=>$img,
					"7"=>$reg[6],
					"8"=>$reg[7],
					"9"=>$reg[8],
					"10"=>$reg[9],
					"11"=>'<button id="'.$reg['idProduct'].'" class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataProduct('.$reg['idProduct'].')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'.
					'<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="eliminarProduct('.$reg['idProduct'].')"><i class="fas fa-trash"></i> </button>');
				$i++;
			}
			$results = array(
            "sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
            "aaData"=>$data);
			echo json_encode($results);

			break;

		case "listCategory":
			require_once "../inc/category.php";

			$objCategory = new Category();

			$query_category = $objCategory->Listar();

			echo '<option value=""></option>';

			while ($reg = $query_category->FetchRow()) {
				echo '<option value=' . $reg['idCategory'] . '>' . $reg['name'] . '</option>';
			}

			break;

		case "listBrand":
			require_once "../inc/brand.php";

			$objBrand = new Brand();

			$query_brand = $objBrand->Listar();

			echo '<option value=""></option>';

			while ($reg = $query_brand->FetchRow()) {
				echo '<option value=' . $reg['idBrand'] . '>' . $reg['name'] . '</option>';
			}

			break;

		case "listUnidadMedida":

			require_once "../inc/unidadMedida.php";

			$objUnidadMedida = new UnidadMedida();

			$query = $objUnidadMedida->Listar();

			echo '<option value=""></option>';

			while ($reg = $query->FetchRow()) {
				echo '<option value=' . $reg['idunidad_medida'] . '>' . $reg['nombre'] . '</option>';
			}

			break;

		case 'cargaDataEdit':

			$id = $_POST["idProduct"];

			require_once "../inc/product.php";
			$objUnidadMedida = new Product();

			$query = $objProduct->cargaDataEdit($id);
			$reg = $query->FetchRow();

			$data = new stdClass();

			$data->idProduct 	= $id;
			$data->cboCategory	= $reg[1];
			$data->cboBrand		= $reg[2];
			$data->cboMedida 	= $reg[3];
			$data->txtProduct	= $reg[4];
			$data->txtModel		= $reg[5];
			$data->txtSummary	= $reg[6];
			$data->txtDetails	= $reg[7];
			$data->txtPricePlata= $reg[8];
			$data->txtPriceOro	= $reg[9];
			$data->txtEstado 	= $reg[10];
			$data->txtFoto = '';

			echo json_encode($data);

			break;

		case 'cargaDetailSingle':

			$id = $_POST["res"];

			$query = $objProduct->detailSingle($id);
			$reg = $query->FetchRow();

			$data = new stdClass();

			$data->idProduct 	= $id;
			$data->cboCategory	= $reg[1];
			$data->cboBrand		= $reg[2];
			$data->txtName 		= $reg[3];
			$data->txtModel		= $reg[4];
			$data->txtSummary	= $reg[5];
			$data->txtDetails	= $reg[6];
			$data->txtPricePlata= $reg[7];
			$data->txtPriceOro	= $reg[8];
			$data->dateReg		= $reg[9];
			$data->dateMod		= $reg[10];
			$data->txtStatus 	= $reg[11];

			$queryPhoto = $objProduct->photoProduct($id);
			$c = 0;
			while ($row = $queryPhoto->FetchRow()) {
				$data->txtPhoto[$c] = $row[0];
				$c++;
			}

			echo json_encode($data);

			break;

	}
