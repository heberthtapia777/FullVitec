<?php
	/**
	 * Created by PhpStorm.
	 * User: hb-ta
	 * Date: 30/8/2020
	 * Time: 04:42
	 */
	# conectare la base de datos
	include 'admin/inc/conexion.php';
	//include 'admin/inc/function.php';
	
	//$op = new cnFunction();
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'pagination.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 9; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;

		$cat = (isset($_REQUEST['cat']) && !empty($_REQUEST['cat']))?$_REQUEST['cat']:0;

		//Cuenta el número total de filas de la tabla*/
		//$count_query = "SELECT count(*) AS numrows FROM product AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto ";
		$count_query = "SELECT count(*) AS numrows FROM product AS p, category AS c, brand AS b WHERE p.idCategory = c.idCategory AND p.idBrand = b.idBrand ";
		if($cat!=0){
			$count_query .= "AND p.idCategory = $cat ";
		}
		$sql = $db->Execute($count_query);
		
		if ($row = $sql->FetchRow()){$numrows = $row['numrows'];}
		
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		//$query = "SELECT r.id_repuesto, f.name, r.name, r.detail FROM repuesto AS r, foto AS f  WHERE r.id_repuesto = f.id_repuesto order by r.id_repuesto LIMIT $offset,$per_page";

		$query = "SELECT p.idProduct,c.name, b.name, p.name, p.model, p.summary, p.pricePlata, p.priceOro, p.dateReg, p.dateMod FROM product AS p, category AS c, brand AS b WHERE p.idCategory = c.idCategory AND p.idBrand = b.idBrand ";
		if($cat!=0){
			$query .= "AND p.idCategory = $cat ";
		}
		$query .= "ORDER BY p.idProduct DESC LIMIT $offset,$per_page ";
		$query = $db->Execute($query);


		$numPag = $per_page * $page;
		if ($numPag > $numrows) {
			$res = $numPag - $numrows;
			$numPag = $numPag - $res;
		}		
		//$sql = "SELECT r.id_repuesto, f.name, r.name, r.detail FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto ORDER BY (r.id_repuesto) DESC";
		
		if ($numrows>0){
			?>
			<!-- Product Count & Orderby Start -->
			<div class="sigma_shop-global">
				<p>Mostrando <b><?=$numPag;?></b> de <b><?=$numrows;?></b> productos </p>
				<!-- <form method="post">
					<select class="form-control" name="orderby">
						<option value="default">Todos</option>
						<option value="latest">Nuevos Productos</option>
						<option value="popularity">Popular</option>
					</select>
				</form> -->
			</div>
			<!-- Product Count & Orderby End -->

			<!-- Preloader Start -->
			<div id="preloaderPro" class="sigma_preloader_product">
				<img src="assets/img/preloader.svg" alt="preloader">
			</div>
			<div class="row masonry">
			<?php
				while($row = $query->FetchRow()){
					$strQuery = "SELECT name FROM photo WHERE idProduct = $row[0]";
					$strQuery = $db->Execute($strQuery);
					$reg = $strQuery->FetchRow();
				?>
                <!-- Product Start -->
				<div class="col-md-4 col-sm-6 masonry-item">
					<div class="sigma_product">
						<div class="sigma_product-thumb">					

						<a href="product-single.php?id=<?=$row[0];?>">
							<img src="admin/vendors/resizer/resizer.php?file=../../modulo/product/uploads/files/<?=$reg[0]?>&width=290&height=280&action=resize&quality=100">
						</a>
							<div class="sigma_product-controls">
								<!-- <a href="#" data-toggle="tooltip" title="Wishlist"> <i class="far fa-heart"></i> </a> -->
								<!-- <a href="product-single.php" data-toggle="tooltip" title="Add To Cart"> <i class="far fa-shopping-basket"></i> </a> -->
								<a href="#" data-toggle="tooltip" title="Vista rápida"> 
									<i  data-toggle="modal" data-target="#quickViewModal" data-id="<?=$row[0]?>" class="far fa-eye"></i> 
								</a>
							</div>
						</div>
						<div class="sigma_product-body">
							<h5 class="sigma_product-title"> <a href="product-single.php?id=<?=$row[0];?>"><?=$row[3]?></a> </h5>									
						</div>
					</div>
				</div>
				<!-- Product End -->
				<?php
			}
			?>
			</div>		
		
			<div class="row clearfix pagination">
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                    <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </nav>
                </div>
			</div>
   
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>
