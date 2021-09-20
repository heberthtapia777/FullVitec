<?php
	require "admin/inc/conexion.php";

	$idCat = (isset($_REQUEST['cat']) && !empty($_REQUEST['cat']))?$_REQUEST['cat']:0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
		require "inc/header.php";
	?>
</head>

<body>

	<!-- Preloader Start -->
	<div class="sigma_preloader">
		<img src="assets/img/preloader.svg" alt="preloader">
	</div>
	<!-- Preloader End -->

	<!-- Search Start -->
	<div class="sigma_search-form-wrapper">
		<div class="sigma_search-trigger close-btn">
			<span></span>
			<span></span>
		</div>
		<form class="sigma_search-form" method="post">
			<input type="text" placeholder="Search..." value="">
			<button type="submit" class="sigma_search-btn">
				<i class="fal fa-search"></i>
			</button>
		</form>
	</div>
	<!-- Search End -->

	<!-- partial:partial/__quickview.html -->
	<div class="modal fade sigma_quick-view-modal" name="quickViewModal" id="quickViewModal" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">

					<div class="close-btn close-dark close" data-dismiss="modal">
						<span></span>
						<span></span>
					</div>

					<div class="row">
						<div class="col-md-6">
							<!--  Carrucel   -->
							<div id="carouselProduct" class="carousel slide" data-ride="carousel">

							</div>
						</div>
						<div class="col-md-6">

							<div class="sigma_product-single-content">
								<!-- Titulo -->
								<h4 class="entry-title"></h4>

								<!-- <div class="sigma_rating-wrapper">
									<div class="sigma_rating">
										<i class="far fa-star active"></i>
										<i class="far fa-star active"></i>
										<i class="far fa-star active"></i>
										<i class="far fa-star active"></i>
										<i class="far fa-star"></i>
									</div>
								</div> -->

								<p> <strong>Disponibilidad: <span>En Stock</span></strong> </p>

								<div id="summary" class="sigma_product-excerpt"><strong></strong></div>
								<!-- <p class="sigma_product-excerpt"><strong>Resolución:</strong>  HD720P (1MP)</p>
								<p class="sigma_product-excerpt"><strong>Lente:</strong> Fijo de 2.8mm. </p>
								<p class="sigma_product-excerpt"><strong>Funciones:</strong> BLC, DNR, Smart IR</p>
								<p class="sigma_product-excerpt"><strong>Visión Nocturna:</strong> ICR 20 metros</p> -->
								<p class="sigma_product-excerpt"><strong>Modelo:</strong> <span id="model"></span></p>

								<form class="sigma_product-atc-form">
									<div class="qty-outter">
										<!-- <a href="product-single.html" class="sigma_btn-custom secondary">Leer Mas</a>										 -->
									</div>
								</form>

								<!-- Post Meta Start -->
								<!-- <div class="sigma_post-single-meta">
									<div class="sigma_post-single-meta-item">
										<div class="sigma_product-controls">
											<a href="#" data-toggle="tooltip" title="Favoritos"> <i class="far fa-heart"></i> </a>
										</div>
									</div>
								</div> -->
								<!-- Post Meta End -->

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- partial -->

	<!-- partial:partia/__sidenav.html -->
	<aside class="sigma_aside sigma_aside-right sigma_aside-right-panel sigma_aside-bg">
		<div class="sidebar">

			<div class="sidebar-widget widget-logo">
				<img src="assets/img/logoFV.png" class="mb-30" alt="img">
				<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>
			</div>

			<!-- Instagram Start -->
			<div class="sidebar-widget widget-ig">
				<h5 class="widget-title">Instagram</h5>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-6">
						<a href="#" class="sigma_ig-item">
							<img src="assets/img/ig/1.jpg" alt="ig">
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-6">
						<a href="#" class="sigma_ig-item">
							<img src="assets/img/ig/2.jpg" alt="ig">
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-6">
						<a href="#" class="sigma_ig-item">
							<img src="assets/img/ig/3.jpg" alt="ig">
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-6">
						<a href="#" class="sigma_ig-item">
							<img src="assets/img/ig/4.jpg" alt="ig">
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-6">
						<a href="#" class="sigma_ig-item">
							<img src="assets/img/ig/5.jpg" alt="ig">
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-6">
						<a href="#" class="sigma_ig-item">
							<img src="assets/img/ig/6.jpg" alt="ig">
						</a>
					</div>
				</div>
			</div>
			<!-- Instagram End -->

			<!-- Social Media Start -->
			<div class="sidebar-widget">
				<h5 class="widget-title">Follow Us</h5>
				<div class="sigma_post-share">
					<ul class="sigma_sm square light">
						<li>
							<a href="#">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-linkedin-in"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fab fa-youtube"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- Social Media End -->

		</div>
	</aside>
	<div class="sigma_aside-overlay aside-trigger-right"></div>
	<!-- partial -->

	<!-- partial:partia/__mobile-nav.html -->
	<aside class="sigma_aside sigma_aside-left">

		<a class="navbar-brand" href="index.html"> <img src="assets/img/logoFV.png" alt="logo"> </a>

		<!-- Menu -->
		<ul>
			<?php
				include "inc/menu.php";
			?>
		</ul>

	</aside>
	<div class="sigma_aside-overlay aside-trigger-left"></div>
	<!-- partial -->

	<!-- partial:partia/__header.html -->
	<header class="sigma_header header-2 can-sticky">

		<!-- Middle Header Start -->
		<div class="sigma_header-middle">
			<nav class="navbar">

				<!-- Controls -->
				<div class="sigma_header-controls style-2">

					<ul class="sigma_header-controls-inner">
						<!-- Desktop Toggler -->
						<li class="aside-toggler style-2 aside-trigger-right desktop-toggler">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</li>

						<!-- Mobile Toggler -->
						<li class="aside-toggler style-2 aside-trigger-left">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</li>
					</ul>

				</div>

				<!-- Menu -->
				<ul class="navbar-nav">
					<?php
						include "inc/menu.php";
					?>
				</ul>

				<!-- Logo Start -->
				<div class="sigma_logo-wrapper">
					<a class="navbar-brand" href="index.html">
						<img src="assets/img/logoFV.png" alt="logo">
					</a>
				</div>
				<!-- Logo End -->

				<!-- Button & Phone -->
				<div class="sigma_header-controls sigma_header-button">
					<a href="tel:+59179134368" class="sigma_header-contact">
						<i class="flaticon-telephone"></i>
						<div class="sigma_header-contact-inner">
							<span>Soporte</span>
							<h6>+591 79134368</h6>
						</div>
					</a>

				</div>

				<!-- Controls -->
				<!-- <div class="sigma_header-controls style-1">

					<a href="#" class="sigma_search-trigger"> <i class="flaticon-magnifying-glass"></i> </a>

				</div> -->

			</nav>
		</div>
		<!-- Middle Header End -->

	</header>
	<!-- partial -->


	<!-- partial:partia/__subheader.html -->
	<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/img/subheader.jpg)">

		<div class="container">
			<div class="sigma_subheader-inner">
				<div class="sigma_subheader-text">
					<h1>Productos</h1>
					<p class="blockquote light"> Nuestro Objetivo es Lograr la Plena Satisfacción de Nuestros Clientes ( Empresas u Hogar ) , Somos Responsables de la Calidad de Nuestro Trabajo.  </p>
				</div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a class="btn-link" href="#">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Productos</li>
					</ol>
				</nav>
			</div>
		</div>

	</div>
	<!-- partial -->

	<!-- Products Start -->
	<div class="section section-padding">
		<div class="container">

			<div class="row">
				<div id="listPro" class="col-lg-8">

					<!-- Product Count & Orderby Start -->
					<!-- <div class="sigma_shop-global">
						<p>Mostrando <b>20</b> de <b>320</b> productos </p>
						<form method="post">
							<select class="form-control" name="orderby">
								<option value="default">Todos</option>
								<option value="latest">Nuevos Productos</option>
								<option value="popularity">Popular</option>
							</select>
						</form>
					</div> -->
					<!-- Product Count & Orderby End -->

					<!-- Preloader Start -->
					<!-- <div id="preloaderPro" class="sigma_preloader_product">
						<img src="assets/img/preloader.svg" alt="preloader">
					</div> -->
					<!-- Preloader End -->

					<!-- Pagination Start -->
					<!-- <ul class="pagination">
						<li class="page-item"><a class="page-link" href="#"> <i class="far fa-chevron-left"></i> </a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item active">
							<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
						</li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#"> <i class="far fa-chevron-right"></i> </a></li>
					</ul> -->
					<!-- Pagination End -->

				</div>

				<!-- Sidebar Start -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Search Start -->
						<div class="sidebar-widget widget-search">
							<h6 class="widget-title">Buscar</h6>
							<form method="post">
								<div class="sigma_search-adv-input">
									<input type="text" class="form-control" placeholder="Buscar Productos" name="search" value="">
									<button type="submit" name="button"><i class="fa fa-search"></i></button>
								</div>
							</form>
						</div>
						<!-- Search End -->

						<!-- Filter: Price Start -->
						<!-- <div class="sidebar-widget">
							<h5 class="widget-title"> Price </h5>
							<input type="text" class="js-range-slider" name="freshness_range" value="" data-type="double" data-min="0" data-max="500" data-from="10" data-to="100" data-grid="true" data-postfix=" $" />
						</div> -->
						<!-- Filter: Price End -->

						<!-- Tags Start -->
						<div class="sidebar-widget widget-categories">
							<h5 class="widget-title"> Nuestras Categorías </h5>
							<ul class="sidebar-widget-list">
								<?php
									$sql = 'SELECT c.idCategory, c.name, COUNT(c.idCategory) AS total FROM product AS p, category AS c WHERE p.idCategory = c.idCategory GROUP BY p.idCategory';
									$query = $db->Execute($sql);

									while ($row = $query->FetchRow()) {
								?>
								<li> <a href="products.php?cat=<?=$row[0];?>"> <?=$row['name'];?>  <span><?=$row['total'];?></span> </a> </li>
								<?php
								}
								?>
							</ul>

						</div>
						<!-- Tags End -->

					</div>
				</div>
				<!-- Sidebar End -->

			</div>

		</div>
	</div>
	<!-- Products End -->

	<!-- partial:partia/__footer.html -->
	<?php
		include "inc/footer.php";
	?>
	<!-- partial -->

	<script>
		$(document).ready(function () {
			loadPagination(1);

			$('#quickViewModal').on('shown.bs.modal', function (event) {

				var button = $(event.relatedTarget) // Button that triggered the modal
				var id = button.data('id') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				//var modal = $(this)
				//modal.find('.modal-title').text('New message to ' + recipient)
				//modal.find('.modal-body input').val(recipient)

				var html;
				$.ajax({
					url: "admin/ajax/productAjax.php?op=cargaDetailSingle",
					type: 'POST',
					dataType: 'JSON',
					async: true,
					data: {res:id},
					success: function(data){
						$('.entry-title').text(data.txtName);
						$('#summary').html(data.txtSummary);
						$('#model').text(data.txtModel);
						$('.qty-outter').html('<a href="product-single.php?id='+data.idProduct+'" class="sigma_btn-custom secondary">Leer Mas</a>')

						indicators	= '<ol class="carousel-indicators">';
						html		= '<div class="carousel-inner">';
						$.each(data.txtPhoto, function( index, value ) {
							//alert( index + ": " + value );
							if(index == 0){
								indicators += '<li data-target="#carouselProduct" data-slide-to="'+index+'" class="active"></li>';
								html += '<div class="carousel-item active">'+
											'<img class="d-block w-100" src="admin/modulo/product/uploads/files/'+value+'" alt="data.txtName">'+
									'</div>';
							}else{
								indicators += '<li data-target="#carouselProduct" data-slide-to="'+index+'"></li>';
								html += '<div class="carousel-item">'+
											'<img class="d-block w-100" src="admin/modulo/product/uploads/files/'+value+'" alt="data.txtName">'+
										'</div>';
							}
						});
						indicators	+= '</ol>';
						html		+= '</div>';
						html += '<a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">'+
									'<span class="carousel-control-prev-icon" aria-hidden="true"></span>'+
									'<span class="sr-only">Previous</span>'+
								'</a>'+
								'<a class="carousel-control-next" href="#carouselProduct" role="button" data-slide="next">'+
									'<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
									'<span class="sr-only">Next</span>'+
								'</a>';
						$('#carouselProduct').html(indicators+html);

						$('.carousel').carousel('dispose');

						$('.carousel').carousel({
							interval: 3000
						});
					}
				});
			})
		});

		function loadPagination(page){
			var parametros = {"action":"ajax","page":page,"cat":<?=$idCat;?>};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'productos.php',
				data: parametros,
				beforeSend: function(objeto){
					//$("#loader").html("<img src='loader.gif'>");
					/** Preloader */
					$('#preloaderPro').removeClass('hidden');

				},
				success:function(data){
					$("#listPro").html(data).fadeIn('slow');
					//$("#loader").html("");
					$('#preloaderPro').addClass('hidden');
				}
			})
		}

		$(function() {
			$('#WAButton').floatingWhatsApp({
				phone: '+59179134368', //WhatsApp Business phone number International format-
				//Get it with Toky at https://toky.co/en/features/whatsapp.
				headerTitle: '¡Chatea con nosotros por WhatsApp!', //Popup Title
				popupMessage: 'Hola como podemos ayudarte?', //Popup Message
				showPopup: true, //Enables popup display
				buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
				//headerColor: 'crimson', //Custom header color
				//backgroundColor: 'crimson', //Custom background button color
				position: "right"
			});
		});
  	</script>

	<style>
		.carousel-indicators .active {
			background-color: rgb(0, 154, 255);
		}
		.carousel-indicators li {
			position: relative;
			-ms-flex: 0 1 auto;
			flex: 0 1 auto;
			width: 30px;
			height: 3px;
			margin-right: 3px;
			margin-left: 3px;
			text-indent: -999px;
			cursor: pointer;
			background-color: #777;
		}
		#summary ol, #summary ul, #txtDetails ol, #txtDetails ul{

    		padding: 0;
    		margin-top: 0;
    		margin-bottom: 20px;
		}
	</style>


<div id="WAButton"></div>

</body>
</html>
