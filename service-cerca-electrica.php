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
		<h1>Cerca Electrica</h1>
		<p class="blockquote light">¿Cómo funciona la central de la cerca eléctrica?</p>
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
		<img src="assets/img/service/details/15.jpg" alt="post">
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
	<p>La cerca eléctrica de alta seguridad perimetral, ofrece la protección y seguridad que usted y su familia necesitan. Podrá proteger su inmueble o empresa contra cualquier intruso ya que su alto voltaje es persuasivo. Este sistema permite tener el control del perímetro de su propiedad, ningún intruso podrá ingresar sin que usted se entere. En caso de corte de los hilos que conforman la cerca, el sistema activa una alarma que indica la interrupción de la corriente eléctrica. Las cercas electrificadas pueden instalarse sobre muros de concreto o sobre herrería. Nuestras instalaciones de cercas se caracterizan por ser estéticas y de excelente calidad.</p>
	<h2>¿Cómo funciona la central de la cerca eléctrica?</h2>
	<p>Al activarse la alarma de la cerca eléctrica se activa también una sirena de 125 Decibeles 30 watts (tipo bancaria y aprueba de sabotaje), lo que provoca aturdimiento y nerviosismo en el intruso, obligándolo en la mayoría de los casos a huir. En caso de que el intruso corte la línea electrificada, la alarma se activa de manera inmediata. Todas nuestras cercas electrificadas cuentan con una batería de respaldo para evitar que los delincuentes traten de desactivarla cortando el suministro de energía eléctrica a la casa o negocio en donde estén instaladas. Todas las líneas electrificadas están conectadas en serie, formando un circuito, lo que permite detectar cualquier corte que haya en la línea.</p>
	
	<h2>Kit para una cerca Electrica</h2>

	<ul>
		<li>1 Central de Cerca Eléctricakit cerca electrica</li>
		<li>2 Control Remoto</li>
		<li>1 Batería de respaldo</li>
		<li>1 Sirena de 120W altos decibeles</li>
		<li>Letreros de precaución</li>
		<li>Accesorios y aterramiento</li>
		<li>Postes galvanizados y aisladores de alta calidad</li>
		<li>Instalación estética</li>
		<li>Parantes con electricidad de 4 lineas y 6 Lineas</li>
	</ul>
	<p>Solicita mas información y cotización acerca de nuestros electrificadores y sus accesorios <a target="blank" href="contact-es.php" target="_blank" ><span>aquí.</span></a></p>



	
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
