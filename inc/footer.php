<?php
	require "admin/inc/conexion.php";
?>
<footer class="sigma_footer footer-2 sigma_footer-dark">
	<div class="sigma_footer-shape waves">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path fill="#282828" fill-opacity="1" d="M0,288L48,256C96,224,192,160,288,149.3C384,139,480,181,576,208C672,235,768,245,864,245.3C960,245,1056,235,1152,218.7C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
		</svg>
	</div>

	<!-- Middle Footer -->
	<div class="sigma_footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 footer-widget">
					<h5 class="widget-title">Nosotros</h5>
					<p class="mb-4">Obtenga la mejor solución para su hogar, su empresa o cualquier lugar interior o exterior </p>
					<div class="d-flex align-items-center justify-content-md-start justify-content-center">
						<i class="far fa-phone custom-primary mr-3"></i>
						<span>+591 79134368</span>
					</div>
					<div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
						<i class="far fa-envelope custom-primary mr-3"></i>
						<span>contacto@fullvitec.com</span>
					</div>
					<div class="d-flex align-items-center justify-content-md-start justify-content-center mt-2">
						<i class="far fa-map-marker custom-primary mr-3"></i>
						<span>Dirección .......</span>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 footer-widget">
					<h5 class="widget-title">Categorias</h5>
					<ul>
					<?php
						$sql = 'SELECT c.idCategory, c.name, COUNT(c.idCategory) AS total FROM product AS p, category AS c WHERE p.idCategory = c.idCategory GROUP BY p.idCategory';
						$query = $db->Execute($sql);

						while ($row = $query->FetchRow()) {
					?>
						<li> <a href="products.php?cat=<?=$row[0];?>"> <?=$row['name'];?> </a> </li>
					<?php
						}
					?>
					</ul>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 footer-widget">
					<h5 class="widget-title">Otros</h5>
					<ul>
						<li> <a href="#">Terminos & Condiciones</a> </li>
						<li> <a href="https://gator4166.hostgator.com:2096/logout/?locale=es_419">Web Mail</a></li>
						<li> <a href="https://fullvitec.com/admin" target="blank">Administrador</a></li>
					</ul>
				</div>
				<!-- <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 d-none d-lg-block footer-widget widget-recent-posts">
					<h5 class="widget-title">Mensajes recientes</h5>
					<article class="sigma_recent-post">
						<a href="blog-details.html"><img src="assets/img/blog/sm/1.jpg" alt="post"></a>
						<div class="sigma_recent-post-body">
							<a href="blog-details.html"> <i class="far fa-calendar"></i> May 20, 2021</a>
							<h6> <a href="blog-details.html">As we've all discovered by now, the world can change</a> </h6>
						</div>
					</article>
					<article class="sigma_recent-post">
						<a href="blog-details.html"><img src="assets/img/blog/sm/2.jpg" alt="post"></a>
						<div class="sigma_recent-post-body">
							<a href="blog-details.html"> <i class="far fa-calendar"></i> May 20, 2021</a>
							<h6> <a href="blog-details.html">Testimony love offering so blessed</a> </h6>
						</div>
					</article>
					<article class="sigma_recent-post">
						<a href="blog-details.html"><img src="assets/img/blog/sm/3.jpg" alt="post"></a>
						<div class="sigma_recent-post-body">
							<a href="blog-details.html"> <i class="far fa-calendar"></i> May 20, 2021</a>
							<h6> <a href="blog-details.html">As we've all discovered by now, the world can change</a> </h6>
						</div>
					</article>
				</div> -->
			</div>
		</div>
	</div>

	<!-- Footer Bottom -->
	<div class="sigma_footer-bottom">
		<div class="container-fluid">
			<div class="sigma_footer-copyright">
				<p> Copyright © Website - <a href="https://www.sstei.com" target="blank" class="custom-primary">SSTEI - 2021</a> </p>
			</div>
			<div class="sigma_footer-logo">
				<img src="assets/img/logoFV.png" alt="logo">
			</div>
			<ul class="sigma_sm square">
				<li>
					<a href="#">
						<i class="fab fa-facebook-f"></i>
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

</footer>

<!-- partial:partia/__scripts.html -->
<script src="assets/js/plugins/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="assets/js/plugins/imagesloaded.min.js"></script>
<script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/jquery.waypoints.min.js"></script>
<script src="assets/js/plugins/jquery.counterup.min.js"></script>
<script src="assets/js/plugins/jquery.zoom.min.js"></script>
<script src="assets/js/plugins/jquery.inview.min.js"></script>
<script src="assets/js/plugins/jquery.event.move.js"></script>
<script src="assets/js/plugins/wow.min.js"></script>
<script src="assets/js/plugins/isotope.pkgd.min.js"></script>
<script src="assets/js/plugins/slick.min.js"></script>
<script src="assets/js/plugins/ion.rangeSlider.min.js"></script>

<script src="admin/assets/js/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="admin/assets/js/jquery.json-2.3.js"></script>

<script src="assets/js/main.js"></script>

<!--Floating WhatsApp javascript-->
<script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>

