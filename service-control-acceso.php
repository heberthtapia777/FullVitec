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
		<h1>Alarmas Contra Incendio</h1>
		<p class="blockquote light"> ??Qu?? son los controles de acceso y asistencia? </p>
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
		<img src="assets/img/service/details/13.jpg" alt="post">
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
				<input type="email" class="form-control" placeholder="Correo Electronico" required name="boletin" title="Direcci??n de correo electr??nico no v??lida.">
				<button type="submit" name="button"><i class="far fa-paper-plane"></i></button>
				</div>
			</form>
		</div>
		</div>
	</div>
	<h2>??Qu?? son los controles de acceso y asistencia?</h2>
	<p>Anteriormente, la tarea de<strong> identificaci??n y control de acceso </strong>de un usuario se realizaba de manera manual. Con el paso del tiempo se han implementado una gran variedad de m??todos para automatizar y facilitar esta tarea.</p>
	<p>Los controles de acceso y asistencia son sistemas que, una vez que identifique al usuario, <strong>permite o niega el acceso </strong>a un recurso. Este recurso puede ser un servicio, habitaci??n, datos, recinto y equipos de una empresa.</p>
	<p>A su vez, <strong>gestionan y registran las horas </strong>de entrada y salida de los trabajadores y visitantes. Tambi??n cuentan con otras herramientas, como se??ales de cambio de turno o periodos de descanso.</p>
	<p>Ambos controles te permitir??n<strong> conocer el comportamiento </strong>que tiene a diario tu personal. Asimismo, controla el ingreso de los usuarios a la empresa o negocio. Restringe el acceso a personas o empleados a espacios que no est??n autorizados.</p>
	<h2>Tipos controles de acceso y asistencia seg??n la forma de identificaci??n</h2>
	<p>A continuaci??n te mostraremos&nbsp; los tipos de identificaciones para los controles de acceso y asistencia que existen. Seg??n la forma de identificaci??n tenemos:</p>
	<h3>Proximidad</h3>
	<p>La ventaja de sistema, es que se implementan tarjetas de proximidad que pueden utilizarse de manera personalizada.&nbsp; Adem??s, puedes incorporarle tarjetas o llaveros, que resultar??n ser muy <strong>c??modos y ligeros</strong> para el usuario.</p>
	<h3>Huella Digital</h3>
	<p>Es un sistema electr??nico que restringe o permite el acceso de una persona a un lugar espec??fico. Lo valida a trav??s de una huella digital.&nbsp; Es un sistema muy seguro que te permitir?? identificar al usuario de manera <strong>sencilla y r??pida</strong>.</p>
	<h3>Detecci??n de Rostro</h3>
	<p>Es un sistema que funciona a trav??s de la detecci??n del rostro. Trabaja por medio de identificaci??n de los rasgos faciales. Es un sistema moderno, muy <strong>confiable y seguro.</strong></p>
	<h3>Teclado</h3>
	<p>El acceso depender?? de una contrase??a que se debe colocar en un teclado. Es un sistema muy com??n en los negocios. Es sencillo y confiable.</p>
	<h2>Beneficios de los Controles de Acceso y Asistencia</h2>
	<p>Los <strong>controles de acceso y asistencia</strong> son herramientas ideales para que tu equipo de trabajo desarrolle un ??ptimo rendimiento laboral. Adem??s, representan una inversi??n inteligente para cualquier tipo de empresa, negocio u organizaci??n.</p>
	<p>Los controles de acceso y asistencia te permiten mantener un nivel de organizaci??n y seguridad dentro de la empresa o negocio. A continuaci??n te mostrar?? algunos beneficios que te pueden ofrecer:</p>
	<ul>
		<li><strong>Abrir puertas de acceso</strong> en un negocio o empresa sin usar llaves o personas que se encarguen de esa actividad.</li>
		<li><strong>Fortalece la seguridad</strong>, ya que puede controlar quien entra y qui??n sale. Cuentan con un sistema que s??lo pueden entrar al lugar personas autorizadas.</li>
		<li><strong>Evitar el acceso de personas a zonas espec??ficas. </strong>Es decir, donde hay documentos importantes, cosas de valor o sustancias peligrosas.</li>
		<li>Optimiza el <strong>control de las entradas y salidas</strong> de los usuarios.</li>
		<li>Controla la <strong>asistencia</strong>, es decir, quien labor?? y quien se ausent??.</li>
		<li>Controla la <strong>puntualidad,</strong> o sea, quien lleg?? puntual y quien lleg?? tarde.</li>
		<li>Calcula las horas trabajadas y las no trabajadas.</li>
	</ul>

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
				headerTitle: '??Chatea con nosotros por WhatsApp!', //Popup Title
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
