<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();

	require_once "../inc/galery.php";

	$objGalery = new Galery();

	switch ($_GET["op"]) {

		case 'SaveOrUpdate':

			$data = $_POST['res'];

			$data = json_decode($data);

			$category			= $data->cboCategory;
			$title			  	= $data->txtTitle;
			$status           	= $data->txtEstado;

			$data->txtFoto = '';

			if(empty($data->txtIdGalery)){
				if($objGalery->Registrar($category,$title,$status)){

					$lastId = $objGalery->LastId();
					$txtFoto = $objGalery->LastPhoto($lastId);

					$data->txtFoto = $txtFoto;
					$data->lastId = $lastId;
					$data->nameCategory = $objGalery->NameCategory($category);

					echo json_encode($data);
				}else{
					echo 0;
				}
			}else{
				$idGalery = $data->txtIdGalery;
				if($objGalery->Modificar($idGalery,$category,$title,$status)){

					$txtFoto = $objGalery->LastPhoto($idGalery);

					$data->txtFoto = $txtFoto;
					$data->lastId = $idGalery;
					$data->nameCategory = $objGalery->NameCategory($category);

					echo json_encode($data);
				}else{
					echo 0;
				}
			}

			break;

		case "delete":

			$id = $_POST["id"];// Llamamos a la variable id del js que mandamos por $.post (Categoria.js (Linea 62))
			$result = $objGalery->Eliminar($id);
			if ($result) {
				echo 0;
			} else {
				echo 1;
			}
			break;

		case "list":
			$query_Tipo = $objGalery->Listar();
			$data= Array();
            $i = 1;
     		while ($reg = $query_Tipo->FetchRow()) {

				require_once "../inc/images.php";

				$objImages = new Images();

				$queryImages = $objImages->Listar($reg[0]);

				$row = $queryImages->FetchRow();

				if (empty($row[0])) {
					$row[0] = 'sin_imagen.jpg';
				}

				$img = '<a href="../../modulo/galery/uploads/files/'.$row[0].'" data-lightbox="image-'.$reg["idGalery"].'" ><img src="../../modulo/galery/uploads/files/thumbnail/'.$row[0].'"></a>';

				$summary = (mb_substr($reg[5], 0, 70, 'UTF-8').'...');

     			$data[] = array(
					"0"=>$i,
					"1"=>$reg[1],
					"2"=>$reg[2],
					"3"=>$img,
					"4"=>$reg[3],
					"5"=>$reg[4],
					"6"=>'<button id="'.$reg['idGalery'].'" class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataGalery('.$reg['idGalery'].')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'.
					'<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="eliminarGalery('.$reg['idGalery'].')"><i class="fas fa-trash"></i> </button>');
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

			$id = $_POST["idGalery"];

			$query = $objGalery->cargaDataEdit($id);
			$reg = $query->FetchRow();

			$data = new stdClass();

			$data->idIdGalery 	= $id;
			$data->cboCategory	= $reg[1];
			$data->txtTitle		= $reg[2];
			$data->txtEstado 	= $reg[3];
			$data->txtFoto = '';

			echo json_encode($data);

			break;

		case 'cargaDetailSingle':

			$id = $_POST["res"];

			$query = $objGalery->detailSingle($id);
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

			$queryPhoto = $objGalery->photoProduct($id);
			$c = 0;
			while ($row = $queryPhoto->FetchRow()) {
				$data->txtPhoto[$c] = $row[0];
				$c++;
			}

			echo json_encode($data);

			break;

		case "listCategoryGalery":

			$query_category = $objGalery->listarCategory();

			echo '<h5 class="active portfolio-trigger" data-filter="*">Todos</h5>';

			while ($reg = $query_category->FetchRow()) {
				echo '<h5 class="portfolio-trigger" data-filter=".'.$reg['idcategory'].'">'.$reg['category'].'</h5>';
			}

			break;

		case "listImagesGalery":

			$query_images = $objGalery->listarImages();

			while ($reg = $query_images->FetchRow()) {
				echo '<div class="col-lg-4 '.$reg['idCategory'].'">
					<div class="sigma_portfolio-item style-2">
						<img src="admin/modulo/galery/uploads/files/'.$reg['images'].'" alt="portfolio">
						<div class="sigma_portfolio-item-content">
							<div class="sigma_portfolio-item-content-inner">
								<h5> <a href="galery.php?gal='.$reg['idGalery'].'&title='.$reg['galery'].'" target="blank"> '.$reg['galery'].'  </a> </h5>
							</div>
							<a href="galery.php?gal='.$reg['idGalery'].'" target="blank"><i class="far fa-arrow-right"></i></a>
						</div>
					</div>
				</div>';
			}

			break;

			case "listImagesDet":

				$query_images = $objGalery->listarImagesDet();
				$recordCount = $query_images->recordCount();

				$col = intdiv($recordCount,3);

				$res = $recordCount/3;

				if ($res > $col) {
					$col = $col+1;
				}

				$c = 1;
				$row = 1;
				$r = 1;
				$html = '';

				while ($reg = $query_images->FetchRow()) {
					if ($c == $row) {
						$html.='<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">';
						$r++;
					}
					if ($c <= $col) {
						$html.= '<a href="admin/modulo/galery/uploads/files/'.$reg['images'].'" data-lightbox="image-'.$reg["idGalery"].'" ><img src="admin/modulo/galery/uploads/files/'.$reg['images'].'" class="w-100 shadow-1-strong rounded mb-4" alt="" /></a>';
						$c++;
					}
					if ($c > $col) {
						$html.= '</div>';
						$row = $c;
						$col = $col+$col;
					}
					echo $html;
					$html = '';
				}

				break;

	}
