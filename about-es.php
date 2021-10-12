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
		<input type="text" placeholder="Buscar..." value="">
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
			<img src="assets/img/logo_fv.png" class="mb-30" alt="img">
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
			<h5 class="widget-title">Síganos</h5>
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

	<a class="navbar-brand" href="index.html"> <img src="assets/img/logo_fv.png" alt="logo"> </a>

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
					<img src="assets/img/logo_fv.png" alt="logo">
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
				<h1>Sobre Nosotros</h1>
				<p class="blockquote light"> Obtenga la mejor solución para su hogar, su empresa o cualquier lugar interior o exterior </p>
			</div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="btn-link" href="#">Inicio</a></li>
					<li class="breadcrumb-item active" aria-current="page">Nosotros</li>
				</ol>
			</nav>
		</div>
	</div>

</div>
<!-- partial -->

<!-- About Start -->
<section class="section">
	<div class="container">

		<div class="row align-items-center">
			<div class="col-lg-6 d-none d-lg-block">
				<div class="sigma_img-box">
					<div class="row">
						<div class="col-lg-6">
							<img src="assets/img/service/details/5.jpg" alt="service">
							<img class="ml-0" src="assets/img/service/details/6.jpg" alt="service">
						</div>
						<div class="col-lg-6 mt-0 mt-lg-5">
							<img src="assets/img/service/details/7.jpg" alt="service">
							<img class="ml-0" src="assets/img/service/details/8.jpg" alt="service">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mr-lg-30">
					<div class="section-title mb-0 text-left">
						<p class="subtitle">Contamos Con Experiencia</p>
						<h4 class="title">Empresa líder en instalación, mantenimiento, reparación y servicio técnico de equipos de seguridad de alta tecnología. </h4>
					</div>
					<p class="blockquote bg-transparent"> Obtenga la mejor solución para su hogar, su empresa o cualquier lugar interior o exterior </p>
					<div class="sigma_icon-block icon-block-3">
						<div class="icon-wrapper">
							<img src="assets/img/textures/icons/1.png" alt="">
						</div>
						<div class="sigma_icon-block-content">
							<h5> Industrial CCTV </h5>
							<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt.</p>
						</div>
					</div>
					<div class="sigma_icon-block icon-block-3">
						<div class="icon-wrapper">
							<img src="assets/img/textures/icons/2.png" alt="">
						</div>
						<div class="sigma_icon-block-content">
							<h5> CCTV CCTV </h5>
							<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Nosotros -->

	<div class="container">
		<div class="entry-content">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="mr-lg-30">
						<div class="section-title mb-0 text-left">
							<p class="subtitle">Misión</p>
							<p class="blockquote bg-transparent">Suministrar, Desarrollar y ejecutar soluciones tecnológicas personalizadas a nuestros clientes, con un servicio basado en la pro actividad, capacitación permanente del equipo de trabajo de <strong>FULLVITEC</strong> y con el compromiso de los estándares de calidad, por medio de sistemas autónomos e inteligentes que les permitirán visualizar e interactuar con su hogar o negocio desde Smartphone, Tablet y o computador en cualquier lugar y a todo momento vinculados a la Seguridad Electrónica. </p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="sigma_canvas">
						<img src="assets/img/projects/details/1.jpg" alt="video">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="entry-content">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="sigma_canvas">
						<img src="assets/img/projects/details/7.jpg" alt="video">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mr-lg-30">
						<div class="section-title mb-0 text-left">
							<p class="subtitle">Visión</p>
							<p class="blockquote bg-transparent">Planeamos ser una empresa exitosa a nivel nacional en la distribución e integración de sistema de seguridad Electrónica, con tecnología avanzada y adecuada para el hogar y empresas que confían en <strong>FULLVITEC</strong> y un recurso humano orientado a la excelencia en servicio del cliente.</p>
						</div>
					</div>

			</div>
		</div>
	</div>

		<!-- About Start -->

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="mr-lg-30">
					<div class="section-title mb-0 text-left">
						<p class="subtitle">Nosotros</p>
						<h4 class="title">Filosofía</h4>
					</div>
					<p class="blockquote bg-transparent"> Nuestra filosofía guía nuestro crecimiento y está basada en las siguientes premisas: </p>

					<p>Nuestra filosofía guía nuestro crecimiento y está basada en las siguientes premisas:</p>
							<p><strong>Integridad</strong></p>
							<ul class="sigma_list sigma_list-2">
								<li>Máximos estándares éticos y profesionales</li>
								<li>Solidaridad con nuestra sociedad y el ambiente</li>
								<li>Respeto y cortesía hacia nuestros clientes, aliados y colaboradores</li>
							</ul>
							<p><strong>Excelencia</strong></p>
							<ul class="sigma_list sigma_list-2">
								<li>Orgullo profesional, hacerlo bien la primera vez</li>
								<li>Aprender de nuestros errores y aciertos</li>
								<li>Medirnos siempre con los mejores</li>
								<li>Invertimos constantemente en capacitación e investigación</li>
								<li>Recompensar la excelencia</li>
								<li>Creatividad e investigación como reto permanente para mejorar</li>
								<li>Cuestionar y criticar constructivamente nuestros servicios, nuestros productos y nuestra forma de hacer las cosas</li>
							</ul>
							<p><strong>Compromiso con nuestros clientes</strong></p>
							<ul class="sigma_list sigma_list-2">
								<li>Conocer, entender y satisfacer al máximo las expectativas de nuestros clientes</li>
								<li>Escuchar y responder oportunamente a las necesidades de nuestros clientes</li>
								<li>Asegurarnos que cada cliente sea siempre una referencia positiva</li>
							</ul>

				</div>
			</div>
				<div class="col-lg-6">
					<img src="assets/img/about.jpg" alt="about">
				</div>
		</div>
	</div>
<!-- About End -->

<!-- Nosotros End -->
</section>
<!-- About End -->

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
