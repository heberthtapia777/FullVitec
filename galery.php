<!DOCTYPE html>
<html lang="es">
<head>
	<?php
		require "inc/header.php";

		$idGalery	= $_GET['gal'];
		$galery		= $_GET['title'];
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
	<div class="modal fade sigma_quick-view-modal" id="quickViewModal" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">

					<div class="close-btn close-dark close" data-dismiss="modal">
						<span></span>
						<span></span>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="sigma_product-single-thumb">
								<img src="assets/img/products/new/1.jpg" alt="product">
							</div>
						</div>
						<div class="col-md-6">

							<div class="sigma_product-single-content">

								<h4 class="entry-title"> Outdoor CCTV Camera with wide angle and Wifi enable  </h4>

								<div class="sigma_product-price">
									<span>352$</span>
									<span>245$</span>
								</div>

								<div class="sigma_rating-wrapper">
									<div class="sigma_rating">
										<i class="far fa-star active"></i>
										<i class="far fa-star active"></i>
										<i class="far fa-star active"></i>
										<i class="far fa-star active"></i>
										<i class="far fa-star"></i>
									</div>
									<span>255 Reviews</span>
								</div>

								<p> <strong class="mr-2">Interested: <span>05</span></strong> <strong>Availablity: <span>In Stock</span></strong> </p>

								<p class="sigma_product-excerpt">Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>

								<form class="sigma_product-atc-form">

									<div class="sigma_product-variation-wrapper">
										<div class="sigma_product-radio form-group">
											<label>
												<input type="radio" name="size" value="" checked>
												<span>XS</span>
											</label>
											<label>
												<input type="radio" name="size" value="">
												<span>S</span>
											</label>
											<label>
												<input type="radio" name="size" value="">
												<span>M</span>
											</label>
											<label>
												<input type="radio" name="size" value="">
												<span>L</span>
											</label>
											<label>
												<input type="radio" name="size" value="">
												<span>XL</span>
											</label>
										</div>
									</div>

									<div class="qty-outter">
										<a href="product-single.html" class="sigma_btn-custom secondary">Buy Now</a>
										<div class="qty-inner">
											<h6>Qty:</h6>
											<div class="qty">
												<span class="qty-subtract"><i class="fa fa-minus"></i></span>
												<input type="text" name="qty" value="1">
												<span class="qty-add"><i class="fa fa-plus"></i></span>
											</div>
										</div>
									</div>

								</form>

								<!-- Post Meta Start -->
								<div class="sigma_post-single-meta">
									<div class="sigma_post-single-meta-item sigma_post-share">
										<h6>Share</h6>
										<ul class="sigma_sm">
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
									<div class="sigma_post-single-meta-item">
										<div class="sigma_product-controls">
											<a href="#" data-toggle="tooltip" title="Compare"> <i class="far fa-signal-4"></i> </a>
											<a href="#" data-toggle="tooltip" title="Wishlist"> <i class="far fa-heart"></i> </a>
										</div>
									</div>
								</div>
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
				<img src="assets/img/logo.png" class="mb-30" alt="img">
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

		<a class="navbar-brand" href="index.html"> <img src="assets/img/logo.png" alt="logo"> </a>

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
					<h1>Galeria de Fotos</h1>
					<p class="blockquote light"> Nuestros trabajos </p>
				</div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="btn-link" href="index.php">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Galeria de Fotos</li>
					</ol>
				</nav>
			</div>
		</div>

	</div>
	<!-- partial -->

	<!-- Categories Start -->
	<div class="section section-padding">
		<div class="container">

			<div class="section-title text-center">
				<h4 class="title"><?=$galery?></h4>
			</div>
			<!-- Gallery -->
			<div class="row" id="listImagesDet">

			</div>
			<!-- Gallery -->

		</div>
	</div>
	<!-- Categories End -->

	<!-- partial:partia/__footer.html -->
	<?php
		include "inc/footer.php";
	?>
	<!-- partial -->
<link rel="stylesheet" type="text/css" href="admin/assets/css/lightbox.css">
<script type="text/javascript" src="admin/assets/js/lightbox.js"></script>
<script>
	$(function() {
		listImagesGalery();

		lightbox.option({
			'resizeDuration': 200,
			'wrapAround': true
		})

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

	function listImagesGalery(){
		$.post("admin/ajax/galeryAjax.php?op=listImagesDet&idGalery=<?=$idGalery;?>", function(r){
			$("#listImagesDet").html(r);
			doIsotope();
		});
	}

</script>
	<div id="WAButton"></div>
</body>
</html>
