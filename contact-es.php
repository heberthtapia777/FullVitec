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
                    <h1>Contáctenos</h1>
                    <p class="blockquote light"> Obtén la mejor solución para su hogar, su empresa o en cualquier lugar interior o exterior </p>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="#">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contáctenos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- partial -->
    <!-- Map Start -->
    <div class="sigma_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d977.5527774153609!2d-68.21660097079292!3d-16.499249913405738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edf6f3e53dae7%3A0x77e53b00be20a0e!2sSala%20Montessori!5e1!3m2!1ses-419!2sbo!4v1630903157176!5m2!1ses-419!2sbo" allowfullscreen="" loading="lazy"></iframe>
        
    </div>
    <!-- Map End -->
    <!-- Contact form Start -->
    <div class="section mt-negative">
        <div class="container">
            <form class="sigma_box box-lg m-0 mf_form_validate ajax_submit" id="formContac" action="javascript:sendContac('formContac','email-contac.php')" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="Nombre completo" class="form-control dark" required name="name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <i class="far fa-envelope"></i>
                            <input type="email" placeholder="Email" class="form-control dark" required name="email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <i class="far fa-pencil"></i>
                            <input type="text" placeholder="Asunto" class="form-control dark" required name="subject">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Ingrese mensaje" cols="45" rows="5" class="form-control dark" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="sigma_btn-custom">Enviar</button>
                    <div class="server_response w-100"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact form End -->
    <!-- Icons Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sigma_icon-block text-center light icon-block-7">
                        <i class="flaticon-email"></i>
                        <div class="sigma_icon-block-content">
                            <span>Enviar Email <i class="far fa-arrow-right"></i> </span>
                            <h5> Email</h5>
                            <p>contacto@fullvitec.com</p>
                            <p>soporte@fullvitec.com</p>
                        </div>
                        <div class="icon-wrapper">
                            <i class="flaticon-email"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sigma_icon-block text-center light icon-block-7">
                        <i class="flaticon-telephone"></i>
                        <div class="sigma_icon-block-content">
                            <span>Llámanos Ahora <i class="far fa-arrow-right"></i> </span>
                            <h5> Telefonos </h5>
                            <p> +591 79134368 </p>
                            <!-- <p> +489 472 928 </p> -->
                        </div>
                        <div class="icon-wrapper">
                            <i class="flaticon-telephone"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sigma_icon-block text-center light icon-block-7">
                        <i class="flaticon-paper-plane"></i>
                        <div class="sigma_icon-block-content">
                            <span>Encuéntranos Aquí <i class="far fa-arrow-right"></i> </span>
                            <h5> Localización </h5>
                            <p>16/A Daddy Yankee Tower</p>
                            <p>New York, US</p>
                        </div>
                        <div class="icon-wrapper">
                            <i class="flaticon-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Icons End -->

    <!-- partial:partia/__footer.html -->
    <?php 
		include "inc/footer.php";
	?>
    <!-- partial -->
    
    <script>
	$(document).ready(function () {

		$("#formContac").validate();	

    });

    function sendContac(idForm, p) {

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
                        title: 'Mensaje enviado correctamente !!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#"+idForm)[0].reset();
                }

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
</body>
<div id="WAButton"></div>
</html>