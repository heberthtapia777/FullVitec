<?php
	require "admin/inc/conexion.php";

	$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id']))?$_REQUEST['id']:0;	

	// $sql = "SELECT p.idProduct,c.name, b.name, p.name, p.model, p.summary, p.pricePlata, p.priceOro, p.dateReg, p.dateMod FROM product AS p, category AS c, brand AS b WHERE p.idCategory = c.idCategory AND p.idBrand = b.idBrand AND p.idProduct = $idProduct";
	// $query = $db->Execute($sql);
						
	// $row = $query->FetchRow();
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
	  <li class="menu-item menu-item-has-children">
		<a href="#">Home Pages</a>
		<ul class="sub-menu">
		  <li class="menu-item"> <a href="index.html">Home v1</a> </li>
		  <li class="menu-item"> <a href="home-v2.html">Home v2</a> </li>
		  <li class="menu-item"> <a href="home-v3.html">Home v3</a> </li>
		</ul>
	  </li>
	  <li class="menu-item menu-item-has-children">
		<a href="#">Blog</a>
		<ul class="sub-menu">
		  <li class="menu-item menu-item-has-children">
			<a href="blog-grid.html">Blog Archive</a>
			<ul class="sub-menu">
			  <li class="menu-item"> <a href="blog-grid.html">Grid View</a> </li>
			  <li class="menu-item"> <a href="blog-list.html">List View</a> </li>
			</ul>
		  </li>
		  <li class="menu-item"> <a href="blog-details.html">Blog Details</a> </li>
		</ul>
	  </li>
	  <li class="menu-item menu-item-has-children">
		<a href="#">Pages</a>
		<ul class="sub-menu">
		  <li class="menu-item"> <a href="about-us.html">About Us</a> </li>
		  <li class="menu-item"> <a href="contact-us.html">Contact Us</a> </li>
		  <li class="menu-item"> <a href="team.html">Team</a> </li>
		  <li class="menu-item"> <a href="faq.html">FAQ</a> </li>
		  <li class="menu-item"> <a href="services.html">Services</a> </li>
		  <li class="menu-item"> <a href="service-details.html">Services Details</a> </li>
		  <li class="menu-item"> <a href="case-studies.html">Case Studies</a> </li>
		  <li class="menu-item"> <a href="case-study.html">Case Study Details</a> </li>
		  <li class="menu-item"> <a href="appointment-form.html">Appointment Form</a> </li>
		</ul>
	  </li>
	  <li class="menu-item menu-item-has-children">
		<a href="#">Shop</a>
		<ul class="sub-menu">
		  <li class="menu-item"> <a href="shop.html">Shop</a> </li>
		  <li class="menu-item"> <a href="product-single.html">Product Details</a> </li>
		  <li class="menu-item"> <a href="Cart.html">Cart</a> </li>
		  <li class="menu-item"> <a href="checkout.html">Checkout</a> </li>
		  <li class="menu-item"> <a href="wishlist.html">Wishlist</a> </li>
		</ul>
	  </li>
	  <li class="menu-item">
		<a href="contact-us.html">Contact Us</a>
	  </li>
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
		  <h1>Detalles de producto</h1>
		  <p class="blockquote light"> Obtén la mejor solución para su hogar, su empresa o en cualquier lugar interior o exterior </p>
		</div>
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a class="btn-link" href="#">Inicio</a></li>
			<li class="breadcrumb-item active" aria-current="page">Detalles de producto</li>
		  </ol>
		</nav>
	  </div>
	</div>

  </div>
  <!-- partial -->

  <!-- Product Content Start -->
  <div class="section section-padding">
	<div class="container">

	  <div class="row">
		<div class="col-lg-4 col-md-6">
		  <div class="sigma_product-single-thumb mb-lg-30">
			<div id="slider" class="slider">
			  <img src="assets/img/products/0.jpg" alt="product">
			  <img src="assets/img/products/1.jpg" alt="product">
			  <img src="assets/img/products/2.jpg" alt="product">
			  <img src="assets/img/products/3.jpg" alt="product">
			</div>
			<div id="slider-nav" class="slider-nav">
			  <img src="assets/img/products/0.jpg" alt="product">
			  <img src="assets/img/products/1.jpg" alt="product">
			  <img src="assets/img/products/2.jpg" alt="product">
			  <img src="assets/img/products/3.jpg" alt="product">
			</div>
		  </div>
		</div>
		<div class="col-lg-4 col-md-6">

			<div class="sigma_product-single-content">

				<!-- <div class="sigma_rating-wrapper">
					<div class="sigma_rating">
						<i class="far fa-star active"></i>
						<i class="far fa-star active"></i>
						<i class="far fa-star active"></i>
						<i class="far fa-star active"></i>
						<i class="far fa-star"></i>
					</div>
					<span>255 Reviews</span>
				</div> -->
				<h4 class="entry-title"> </h4>

				<!-- <div class="sigma_product-price">
					<span>352$</span>
					<span>245$</span>
				</div> -->
				<!-- <p> <strong class="mr-2">Interested: <span>05</span></strong> <strong>Availablity: <span>In Stock</span></strong> </p> -->
				<p> <strong>Disponibilidad: <span>En Stock</span></strong> </p>
			
				<div id="summary" class="sigma_product-excerpt"></div>

			<form class="sigma_product-atc-form">	  
				<br>
			  <div class="qty-outter">
				<a id="buttonCotizar" href="#" class="sigma_btn-custom">Cotizar</a>
				<!-- <div class="qty-inner">
				  <h6>Qty:</h6>
				  <div class="qty">
					<span class="qty-subtract"><i class="fa fa-minus"></i></span>
					<input type="text" name="qty" value="1">
					<span class="qty-add"><i class="fa fa-plus"></i></span>
				  </div>
				</div> -->
			  </div>

			</form>

			<!-- Post Meta Start -->
			<!-- <div class="sigma_post-single-meta">
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
			</div> -->
			<!-- Post Meta End -->

			<!-- <h6>Guaranteed Safe Checkout</h6>
			<img src="assets/img/payments.png" alt="payments"> -->

		  </div>

		</div>
		<!-- Sidebar Start -->
		<div class="col-lg-4">
		  <div class="sidebar">

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

			<!-- Filter: Price Start -->
			<!-- <div class="sidebar-widget">
			  <h5 class="widget-title"> Price </h5>
			  <input type="text" class="js-range-slider" name="freshness_range" value="" data-type="double" data-min="0" data-max="500" data-from="10" data-to="100" data-grid="true" data-postfix=" $" />
			</div> -->
			<!-- Filter: Price End -->

		  </div>
		</div>
		<!-- Sidebar End -->
	  </div>


	</div>
  </div>
  <!-- Product Content End -->

  <!-- Additional Information Start -->
  <div class="section pt-0">
	<div class="container">
	  <div class="sigma_product-additional-info">

		<ul class="nav" id="bordered-tab" role="tablist">
		  <li class="nav-item">
			<a class="nav-link active" id="tab-product-desc-tab" data-toggle="pill" href="#tab-product-desc" role="tab" aria-controls="tab-product-desc" aria-selected="true">Descripción </a>
		  </li>
		  <!-- <li class="nav-item">
			<a class="nav-link" id="tab-product-info-tab" data-toggle="pill" href="#tab-product-info" role="tab" aria-controls="tab-product-info" aria-selected="false">Additional Information</a>
		  </li> -->
		  <li class="nav-item">
			<a class="nav-link" id="tab-product-reviews-tab" data-toggle="pill" href="#tab-product-reviews" role="tab" aria-controls="tab-product-reviews" aria-selected="false">Solicite una Cotización</a>
		  </li>
		</ul>

		<div class="tab-content" id="bordered-tabContent">
			<div class="tab-pane fade show active" id="tab-product-desc" role="tabpanel" aria-labelledby="tab-product-desc-tab">
				<h4>Descripción</h4>
				<p>  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
				non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
				bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica</p>
				<p>  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
					non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
					bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica</p>
			</div>
			<!-- <div class="tab-pane fade" id="tab-product-info" role="tabpanel" aria-labelledby="tab-product-info-tab">
				<h4>Additional Information</h4>

				<table>
				<thead>
					<tr>
					<th scope="col">Attributes</th>
					<th scope="col">Values</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td> <strong>Color</strong> </td>
					<td>blue, red, yellow, green</td>
					</tr>
					<tr>
					<td> <strong>Material</strong> </td>
					<td>Plastic , Steel , Glass </td>
					</tr>
				</tbody>
				</table>
			</div> -->
			<div class="tab-pane fade" id="tab-product-reviews" role="tabpanel" aria-labelledby="tab-product-reviews-tab">
				<h4>Escribanos</h4>

				<!-- <div class="sigma_rating-wrapper">
					<div class="sigma_rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
					<span>Your Review</span>
				</div> -->

				<!-- Review Form start -->
				<div class="comment-form" >
					<form id="commentForm" method="POST" action="javascript:sendCot('commentForm','email-quote.php')">
						<div class="row">						
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" placeholder="Nombre Completo" id="fname" name="fname" required value="">
							</div>
							<div class="col-md-6 form-group">
								<input type="email" class="form-control" placeholder="Email" id="email" name="email" required value="">
							</div>
							<div class="col-md-6 form-group">
								<label for="">Referencia:</label>
								<input type="text" class="form-control" placeholder="Referencia" id="refproduct" name="refproduct" readonly value="">
							</div>
							<div class="col-md-6 form-group">
								<label for="">Modelo:</label>
								<input type="text" class="form-control" placeholder="Referencia" id="refmodel" name="refmodel" readonly value="">
							</div>
							<div class="col-md-12 form-group">
								<textarea class="form-control" placeholder="Escribe tu Consulta" id="messaje" name="messaje" required rows="7"></textarea>
							</div>
						</div>

						<button type="submit" class="sigma_btn-custom" name="button">Enviar</button>
					</form>
				</div>
				<!-- Review Form End -->

				<!-- Reviews Start -->
				<!-- <div class="comments-list">
					<ul>
						<li class="comment-item">
						<img src="assets/img/team/1.jpg" alt="comment author">
						<div class="comment-body">

							<h5>Robert John</h5>
							<div class="sigma_rating">
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star"></i>
							</div>

							<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate Backup  foster collaborative thinking to further the overall value proposition.</p>
							<a href="#" class="btn-link"> Reply <i class="far fa-reply"></i> </a>
							<span><i class="far fa-clock"></i> January 13 2021</span>
						</div>
						</li>
						<li class="comment-item">
							<img src="assets/img/team/2.jpg" alt="comment author">
							<div class="comment-body">
								<h5>Christine Hill</h5>
								<div class="sigma_rating">
								<i class="fa fa-star active"></i>
								<i class="fa fa-star active"></i>
								<i class="fa fa-star active"></i>
								<i class="fa fa-star active"></i>
								<i class="fa fa-star active"></i>
								</div>
								<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches</p>
								<a href="#" class="btn-link"> Reply <i class="far fa-reply"></i> </a>
								<span><i class="far fa-clock"></i> January 13 2021</span>
							</div>
						</li>
					</ul>
				</div> -->
				<!-- Reviews End -->

			</div>
		</div>

	  </div>
	</div>
  </div>
  <!-- Additional Information End -->

  	<!-- partial:partia/__footer.html -->
  	<?php 
		include "inc/footer.php";
	?>
  	<!-- partial -->


<script>
	$(document).ready(function () {

		$("#commentForm").validate();
		
		var html;
		$.ajax({
			url: "admin/ajax/productAjax.php?op=cargaDetailSingle",
			type: 'POST',
			dataType: 'JSON',
			async: true,
			data: {res:<?=$id;?>},
			success: function(data){
				$('.entry-title').text(data.txtName);
				$('#summary').html(data.txtSummary);
				$('#tab-product-desc').html(data.txtDetails);
				$('#model').text(data.txtModel);
				$('#refmodel').val(data.txtModel);
				$('#refproduct').val(data.txtName);
				//$('.qty-outter').html('<a href="product-single.php?id='+data.idProduct+'" class="sigma_btn-custom secondary">Leer Mas</a>')
				
				var slider = "";
				var slider_nav = "";
				$.each(data.txtPhoto, function( index, value ) {					
					slider		+= '<img src="admin/modulo/product/uploads/files/'+value+'" alt="Productos" >';
					slider_nav	+= '<img src="admin/modulo/product/uploads/files/'+value+'" alt="Productos" >';					
				});
				$('#slider').html(slider);
				$('#slider-nav').html(slider_nav);

				/** slider product single */

				$('.sigma_product-single-thumb .slider').slick({slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.sigma_product-single-thumb .slider-nav'});

				$('.sigma_product-single-thumb .slider-nav').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					asNavFor: '.sigma_product-single-thumb .slider',
					dots: false,
					centerMode: false,
					arrows: false,
					focusOnSelect: false
				});

			}
		});
		
		$("#buttonCotizar").on("click", function(){
			var posicion = $(".sigma_product-additional-info").offset().top;
			$("html, body").animate({
				scrollTop: posicion
			}, 2000); 
			$('#tab-product-reviews-tab').tab('show');
		});
	});

	function sendCot(idForm, p) {

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
					$("#"+idForm).find("#fname").val("");
					$("#"+idForm).find("#email").val("");
					$("#"+idForm).find("#messaje").val("");
				}

			}
		})
	}
</script>

</body>

</html>
