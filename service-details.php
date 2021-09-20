<!DOCTYPE html>
<html lang="es" dir="ltr">
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
		<h1>Cámaras de Seguridad CCTV</h1>
		<p class="blockquote light"> ¿Qué es CCTV? ¿Cuáles son sus funciones y objetivos? </p>
	</div>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a class="btn-link" href="#">Inicio</a></li>
		<li class="breadcrumb-item active" aria-current="page">Detalle de Servicio</li>
		</ol>
	</nav>
	</div>
</div>

</div>
<!-- partial -->

<!-- Post Content Start -->
<div class="section">
<div class="container">

	<div class="entry-content">

	<div class="sigma_post-single-thumb">
		<img src="assets/img/service/details/9.png" alt="post">
		<div class="sigma_icon-block icon-block-7">
		<i class="flaticon-technical-support-1"></i>
		<div class="icon-wrapper">
			<i class="flaticon-technical-support-1"></i>
		</div>
		<div class="sigma_icon-block-content">
			<h5>Confianza & <span>Seguridad</span> </h5>
			<!-- <p>Vestibulum ac diam sit amet quam vehicula elementum</p> -->
			<form method="POST" id="formBoletin" action="javascript:sendBoletin('formBoletin','subsBol.php')">
				<div class="sigma_search-adv-input">
				<input type="email" class="form-control" placeholder="Correo Electronico" required name="boletin" title="Dirección de correo electrónico no válida.">
				<button type="submit" name="button"><i class="far fa-paper-plane"></i></button>
				</div>
			</form>
		</div>
		</div>
	</div>

	<p>
	Un CCTV o circuito cerrado de televisión es una instalación de equipos conectados que generan un circuito de imágenes que solo puede ser visto por un grupo determinado de personas, estas se personalizan para adaptarse a las necesidades de cada cliente bien sean orientadas a la seguridad, vigilancia o mejora de servicio. 
	</p>
	<h2>¿Cómo funciona un CCTV?</h2>
	<p>
	Debido al desarrollo de nuevas tecnologías existen muchos tipos de CCTV, analógicas, digitales, con o sin cables que varían en su forma de operación, los equipos básicamente son los mismos, se requieren cámaras, lentes, cables y un monitor para visualizar las imágenes.
	</p>
	<p>
	Las cámaras reciben las imágenes que son enviadas a los monitores por cable o vía inalámbrica donde son observados por personal calificado o vistos a distancia en tiempo real, a su vez son grabados en dispositivos o equipos dedicados para ello.
	</p>
	<p>
	Los equipos más modernos permiten comenzar la grabación al detectar movimiento, esto ahorra espacio de almacenamiento durante el tiempo de inactividad de la zona protegida, también envía notificaciones por correo electrónico o SMS al detectar actividad.
	</p>
	<p>
	Los sistemas con conexión a internet permiten acceder a las imágenes vía remota desde dispositivos móviles.
	</p>
	<p>
	Los monitores pueden ser compartidos por varias cámaras de manera que no se necesita uno por cada cámara conectada al sistema, algunos equipos dividen la pantalla en cuatro o más partes para ver las imágenes simultaneas de todas las cámaras, otros permiten seleccionar cual cámara deseamos monitorear, las tecnologías actuales permiten conectar multiplexores que incorporan de forma electrónica estos controles.
	</p>
	<h2>Objetivos de un CCTV o circuito cerrado de televisión</h2>
	<ul>
		<li>Los sistemas de CCTV se han convertido en un apoyo fundamental en la prevención y control de pérdida y riesgos, al igual que la supervisión para mejora de la efectividad de las empresas.</li>
		<li>La supervisión y control de clientes y empleados es más efectiva con el uso de sistemas de CCTV, el apoyo de esta tarea con sistemas inteligentes hacen que esta labor sea muy sencilla con poco cantidad de personas.</li>
		<li>Las áreas de cobertura son más extensas reduciendo los gastos de vigilancia y siendo más efectivos en cuanto a la seguridad.</li>
		<li>El control de las perdidas por robos es más efectivo y no solo porque las personas saben que están siendo grabadas, sino también porque fácilmente se descubre a los culpables al revisar las grabaciones.</li>
		<li>La existencia de sistemas CCTV por si solo representa un elemento de disuasión, algunas empresas prefieren el uso de cámaras con tamaños y apariencias que se vean amenazantes para las personas con intenciones malsanas.</li>
		<li>Las acciones delictivas quedan grabadas y pueden ser utilizadas como evidencia de delitos en juicios o acciones legales o despidos justificados de empleados que cometen irregularidades.</li>
		<li>Los análisis de los motivos que origina fallos en la producción de empresas son corregidos al revisar los vídeos e identificar los motivos que las originan evitando que vuelvan a ocurrir.</li>
		<li>Una preocupación recurrente de las empresas es el mejorar la calidad de servicio, en este sentido los sistemas de CCTV juegan un papel importante para la revisión de los procesos en la búsqueda de la perfección.</li>
	</ul>
	<h2>Preguntas frecuentes</h2>
	<h3>¿Cuál es la función principal del sistema CCTV?</h3>
	<p>Es un Circuito Cerrado de Televisión que permite tener controlada una zona específica y solamente ciertos usuarios pueden tener acceso a las imágenes</p>
	<h3>¿Por qué necesito un CCTV?</h3>
	<p>Con un sistema CCTV podrás tener vigilado tu hogar, oficina, tienda o incluso tu nave industrial. <a target="blank" href="products.php">Aquí tienes más información</a>.</p>
	<h3>¿Cuál es el precio de un CCTV?</h3>
	<p>Según el campo que quieras cubrir con el sistema CCTV te haremos un presupuesto a medida para que no tengas que gastar de más. <a target="blank" href="contact-es.php">Ponte en contacto</a></p>
	<h2>Un circuito cerrado de cámaras muy útil para todo tipo de negocios y locales</h2>
	<p>Gracias a la cobertura que ofrecen estos sistemas de vigilancia, tendrás todas las zonas de acceso cubiertas con un servicio totalmente controlado para evitar el acceso de intrusos. El circuito cerrado de cámaras de vigilancia ofrece un apoyo a la logística de protección mucho más eficiente que otros sistemas de vigilancia convencionales.</p>
	<p>&nbsp;</p>
	<h3>¿Deseas tener un sistema de CCTV en tu hogar?</h3>
	<p>Contacta con nuestro equipo especializado que te ayudará a proteger las zonas más importantes.</p>
	<p><a target="blank" href="contact-es.php" target="_blank" ><span>Ponte en contacto con nosotros</span></a></p>

	</div>

</div>
</div>
<!-- Post Content End -->

<!-- partial:partia/__scripts.html -->
<?php
	include "inc/footer.php";
?>
<!-- partial -->

<script>
	$(function() {
		$("#formBoletin").validate();
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

		function sendBoletin(idForm, p){
			var dato = JSON.stringify($('#' + idForm).serializeObject());
			$.ajax({
				url: p,
				type: 'post',
				dataType: 'json',
				async: true,
				data: { res: dato },
				success: function(data) {
					if (data == 1) {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Registrado correctamente !!!',
							showConfirmButton: false,
							timer: 1500
						});
						$("#"+idForm)[0].reset();
					}

				}
			})
		}
</script>

<div id="WAButton"></div>

</body>

</html>
