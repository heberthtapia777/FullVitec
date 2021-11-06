<?php
	require "admin/inc/conexion.php";
?>
<li class="menu-item">
	<a href="index.php">Inicio</a>
</li>
<li class="menu-item">
	<a href="about-es.php">Nosotros</a>
</li>
<!-- <li class="menu-item">
	<a href="blog.php">Blog</a>
</li>-->
<li class="menu-item menu-item-has-children">
	<a href="#">Servicios</a>
	<ul class="sub-menu">
		<li class="menu-item"> <a href="services.php">Servicios</a> </li>
		<li class="menu-item"> <a href="service-CCTV.php">Cámaras de Seguridad CCTV</a> </li>
		<li class="menu-item"> <a href="service-ip.php">Cámaras Digitales y Analogicas</a> </li>
		<li class="menu-item"> <a href="service-alarma.php">Alarmas de Seguridad</a> </li>
		<li class="menu-item"> <a href="service-alarma-incendio.php">Alarmas Contra Incendio</a> </li>
		<li class="menu-item"> <a href="service-control-acceso.php">Control de Acceso y Asistencia</a> </li>
		<li class="menu-item"> <a href="service-video-portero.php">Vídeo Portero Digital</a> </li>
		<li class="menu-item"> <a href="service-cerca-electrica.php">Cercas Electricas</a> </li>
		<li class="menu-item"> <a href="service-redes-datos.php">Redes de Datos</a> </li>
	</ul>
</li>
<li class="menu-item menu-item-has-children">
	<a href="#">Productos</a>
	<ul class="sub-menu">
		<li class="menu-item"> <a href="products.php">Productos</a> </li>
		<?php
			$sql = 'SELECT c.idCategory, c.name, COUNT(c.idCategory) AS total FROM product AS p, category AS c WHERE p.idCategory = c.idCategory GROUP BY p.idCategory';
			$query = $db->Execute($sql);

			while ($row = $query->FetchRow()) {
		?>
			<li class="menu-item"> <a href="products.php?cat=<?=$row[0];?>"> <?=$row['name'];?> </a> </li>
		<?php
			}
		?>
	</ul>
</li>
<li class="menu-item">
	<a href="contact-es.php">Contáctenos</a>
</li>