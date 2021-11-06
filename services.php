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
					<h1>Servicios</h1>
					<p class="blockquote light"> Obtén la mejor solución para su hogar, su empresa o en cualquier lugar interior o exterior </p>
				</div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a class="btn-link" href="index.php">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Servicios</li>
					</ol>
				</nav>
			</div>
		</div>

	</div>
	<!-- partial -->

	<!-- Services Start -->
	<div class="section section-padding">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<a href="service-CCTV.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/5.jpg" alt="img">
							<i class="flaticon-cctv"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Cámaras de Seguridad CCTV</h5>
							<p>Un CCTV o circuito cerrado de televisión es una instalación de equipos conectados</p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6">
					<a href="service-ip.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/6.jpg" alt="img">
							<i class="flaticon-security-camera"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Cámaras de Seguridad IP</h5>
							<p>Cámara IP funciona sobre el protocolo de internet, le permite monitorear su casa o negocio </p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6">
					<a href="service-alarma.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/7.jpg" alt="img">
							<i class="flaticon-security"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Alarmas de Seguridad</h5>
							<p>Un sistema de alarma consiste en la instalación de una serie de equipos electrónicos en los lugares de su hogar o empresa </p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6">
					<a href="service-alarma-incendio.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/8.jpg" alt="img">
							<i class="flaticon-cctv-1"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Alarmas contra Incendio</h5>
							<p>La posibilidad de sufrir un incendio en casa o en el trabajo es algo que raramente se nos pasa por la cabeza </p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6">
					<a href="service-control-acceso.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/9.jpg" alt="img">
							<i class="flaticon-fingerprint"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Control de Acceso y Asistencia</h5>
							<p>Soluciones tecnológicas para control de acceso a un lugar determinado, puede ser acceso peatonal, acceso vehicular, etc... </p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6">
					<a href="service-video-portero.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/10.jpg" alt="img">
							<i class="flaticon-cctv-1"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Video Portero Digital</h5>
							<p>El portero y video portero digital incorpora tecnología más inmune ante interferencias </p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6">
					<a href="service-cerca-electrica.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/11.jpg" alt="img">
							<i class="flaticon-security"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Cercas Eléctricas</h5>
							<p>También conocida como valla eléctrica, es un sistema de seguridad, en el que un alimentador o electrificador genera impulsos cortos de alta tensión a intervalos de un segundo para proteger perímetros </p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-6">
					<a href="service-redes-datos.php" class="sigma_service style-2">
						<div class="sigma_service-thumb">
							<img src="assets/img/service/12.jpg" alt="img">
							<i class="flaticon-technical-support"></i>
						</div>
						<div class="sigma_service-body">
							<h5>Redes de Datos</h5>
							<p>Las redes de datos son infraestructuras que han sido creadas para poder transmitir información a través del intercambio de datos </p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>
	<!-- Services End -->

	<!-- Clients Start -->
	<div class="section section-padding primary-bg pattern-map">
		<div class="container-fluid">
			<div class="row">

				<div class="col-lg-7">
					<div class="row">
						<div class="col-lg-4">
							<div class="sigma_client">
								<img src="assets/img/clients/1.png" alt="client">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="sigma_client">
								<img src="assets/img/clients/2.png" alt="client">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="sigma_client">
								<img src="assets/img/clients/3.png" alt="client">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="row">
						<div class="col-lg-6">
							<div class="sigma_client">
								<img src="assets/img/clients/4.png" alt="client">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="sigma_client">
								<img src="assets/img/clients/5.png" alt="client">
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- Clients End -->
	<br><br><br><br>

	<!-- partial:partia/__footer.html -->
	<?php
		include "inc/footer.php";
	?>
	<!-- partial -->
<script>
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
	<div id="WAButton"></div>
</body>
</html>
