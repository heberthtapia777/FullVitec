<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
	<?PHP
		include '../../inc/header.php';
	?>
</head>

  <body>
	<!-- ===============================================-->
	<!--    Main Content-->
	<!-- ===============================================-->
	<main class="main" id="top">
	  <div class="container" data-layout="container">
		<script>
		  var isFluid = JSON.parse(localStorage.getItem('isFluid'));
		  if (isFluid) {
			var container = document.querySelector('[data-layout]');
			container.classList.remove('container');
			container.classList.add('container-fluid');
		  }
		</script>

		<?PHP
			include '../../inc/menu.php';
		?>

		<div class="content">
			<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
				<button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
				<a class="navbar-brand mr-1 mr-sm-3" href="../index-2.html">
				<div class="d-flex align-items-center"><img class="mr-2" src="../../assets/img/illustrations/sstei.png" alt="" width="40" /><span class="font-sans-serif">SSTEI</span></div>
				</a>
					<?PHP
						//include '../../inc/search.php';
						include '../../inc/menuTop.php';
					?>
			</nav>

			<script>
				var navbarPosition = localStorage.getItem('navbarPosition');
				var navbarVertical = document.querySelector('.navbar-vertical');
				var navbarTopVertical = document.querySelector('.content .navbar-top');
				var navbarTop = document.querySelector('[data-layout] .navbar-top');
				var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

				if (navbarPosition === 'top') {
				navbarTop.removeAttribute('style');
				navbarTopVertical.remove(navbarTopVertical);
				navbarVertical.remove(navbarVertical);
				navbarTopCombo.remove(navbarTopCombo);
				} else if (navbarPosition === 'combo') {
				navbarVertical.removeAttribute('style');
				navbarTopCombo.removeAttribute('style');
				navbarTop.remove(navbarTop);
				navbarTopVertical.remove(navbarTopVertical);
				} else {
				navbarVertical.removeAttribute('style');
				navbarTopVertical.removeAttribute('style');
				navbarTop.remove(navbarTop);
				//navbarTopCombo.remove(navbarTopCombo);
				}
			</script>

			<div class="card mb-3">
				<div class="card-body">
					<div class="row flex-between-center">
						<div class="col-md">
							<h5 class="mb-2 mb-md-0" data-anchor="data-anchor">Empleados</h5>
						</div>
						<div class="col-auto">
							<button class="btn btn-outline-primary btn-sm" id="btnNuevo"><i class="fas fa-plus"></i> Nuevo</button>
							<button class="btn btn-outline-danger btn-sm" id="btnCancel" onclick="cancelar()"><i class="fas fa-window-close"></i> Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		  	<div class="card">
				<div class="card-body bg-light">
					<div id="verLista">
						<table id="tblEmpleado" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Tipo Doc.</th>
									<th># Doc.</th>
									<th>Email</th>
									<th>Celular</th>
									<th>Foto</th>
									<th>Opciones</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>#</th>
									<th>Apellidos</th>
									<th>Documento</th>
									<th>Num. Documento</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Foto</th>
									<th>Opciones</th>
								</tr>
							</tfoot>

							<tbody id="empleado">

							</tbody>
						</table>
					</div>
					<div id="verForm">
						<div class="card mb-3">
							<div class="card-body">
								<div class="row flex-between-center">
									<div class="col-md">
										<h5 class="mb-2 mb-md-0">Nuevo Empleado</h5>
									</div>

								</div>
							</div>
						</div>
						<form role="form" class="floating-labels m-t-40" name="frmEmpleado" id="frmEmpleado" enctype="multipart/form-data" class="needs-validation" novalidate="">
							<div class="row g-0">
								<div class="col-lg-12 left">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<input id="txtIdEmpleado" type="hidden" maxlength="50" class="form-control" name="txtIdEmpleado" placeholder="" autofocus="" />
												<label>Apellido Paterno:</label>
												<input id="txtApPaterno" type="text" maxlength="40" name="txtApPaterno" class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Apellido Materno:</label>
												<input id="txtApMaterno" type="text" maxlength="20" name="txtApMaterno" class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Nombre:</label>
												<input id="txtNombre" type="text" maxlength="20" name="txtNombre" required="" class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
									</div>

								</div>
								<div class="col-lg-12 left">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Tipo de Documento:</label>
												<select id="cboTipo_Documento" required="" name="cboTipo_Documento" class="form-control">
													<option value=""></option>
													<option value="C.I.">C.I.</option>
													<option value="NIT">NIT</option>
												</select>
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Nro. de Documento:</label>
												<input id="txtNum_Documento" type="text" maxlength="20" name="txtNum_Documento" required="" class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Email:</label>
												<input id="txtEmail" type="text" maxlength="70" name="txtEmail"  class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 left">
									<div class="row">
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Dirección:</label>
												<input id="txtDireccion" type="text" maxlength="100" name="txtDireccion" class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group has-primary m-b-40">
											<label>Nª de Domicilio:</label>
												<input id="txtNumber" type="text" maxlength="100" name="txtNumber" class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 left">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
											<button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#modalMap">Abrir Mapa</button>
										</div>
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Latitud</label>
												<input id="cx" name="cx" type="text" value="" readonly class="form-control" data-validation="required"/>
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Longitud</label>
												<input id="cy" name="cy" type="text" value="" readonly class="form-control" data-validation="required"/>
												<span class="bar"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 left">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Teléfono:</label>
												<input id="txtTelefono" type="text" name="txtTelefono" class="form-control phone-group" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Celular:</label>
												<input id="txtCelular" type="text" name="txtCelular" class="form-control phone-group" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Fecha Nacimiento:</label>
												<input id="txtFecha_Nacimiento" type="date" name="txtFecha_Nacimiento" class="form-control" autofocus="" />
												<span class="bar"></span>
											</div>
										</div>

									</div>
								</div>
								<div class="col-lg-12 left">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="form-group has-primary m-b-40">
												<label>Estado:</label>
												<select class="form-control" required="" name="txtEstado" id="txtEstado">
												<option value="Activo">Activo</option>
												<option value="Inactivo">Inactivo</option>
												</select>
												<span class="bar"></span>
											</div>
										</div>
									</div>
									<input id="numRow" type="hidden" name="numRow" value=""/>
								</div>
								<div class="row">
									<div class="col-md-12">
										<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
										<div class="row fileupload-buttonbar">
											<div class="col-lg-8">
												<!-- The fileinput-button span is used to style the file input field as button -->
												<span class="btn btn-success btn-sm fileinput-button">
													<i class="fa fa-folder-open" aria-hidden="true"></i>
													<span>Seleccione Foto ...</span>
													<input type="file" id="files" name="files[]" multiple>
												</span>
												<button type="submit" class="btn btn-primary btn-sm start">
													<i class="fa fa-upload"></i>
													<span>Iniciar Subida</span>
												</button>
												<button type="reset" class="btn btn-warning btn-sm cancel">
													<i class="fa fa-ban"></i>
													<span>Cancelar</span>
												</button>
												<button type="button" class="btn btn-danger btn-sm delete">
													<i class="fa fa-trash"></i>
													<span>Borrar</span>
												</button>
												<input type="checkbox" class="toggle">
												<!-- The global file processing state -->
												<span class="fileupload-process"></span>
											</div>
											<!-- The global progress state -->
											<div class="col-lg-4 fileupload-progress fade">
												<!-- The global progress bar -->
												<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
													<div class="progress-bar progress-bar-success" style="width:0%;"></div>
												</div>
												<!-- The extended global progress state -->
												<div class="progress-extended">&nbsp;</div>
											</div>
										</div>
										<div class="file-preview">
											<div class="file-drop-zone-title">
												Arrastre y suelte aquí los archivos …
											</div>
											<div class="file-drop-zone">
												<!-- The table listing the files available for upload/download -->
												<table id="upload" role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="card mt-3">
								<div class="card-body">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<button type="submit" class="btn btn-outline-success btn-sm mr-2"><i class="fas fa-save"></i> Guardar</button>
											<button class="btn btn-outline-danger btn-sm" id="btnCancel" onclick="cancelar()"><i class="fas fa-window-close"></i> Cancelar</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<footer>
			<div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
			<div class="col-12 col-sm-auto text-center">
				<p class="mb-0 text-600">Todos los Derechos Reservados <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2021 &copy; <a href="https://sstei.com/">SSTEI</a></p>
			</div>
			<div class="col-12 col-sm-auto text-center">
				<p class="mb-0 text-600">v1.0.0</p>
			</div>
			</div>
		</footer>
	</div>
		<?php
			include "../../inc/modalConfig.php";
		?>
	  </div>
	</main>
	<!-- ===============================================-->
	<!--    End of Main Content-->
	<!-- ===============================================-->

	<!-- modal mapa -->
	<div id="modalMap" name="modalMap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myLargeModalLabel">Ubicar Dirección</h5>
					<button class="btn-close" type="button" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="col-lg-12 col-md-12 col-lg-12">
						<form class="floating-labels m-t-40">
							<div class="row">
								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
									<div class="form-group has-primary m-b-40">
										<label>Buscar en Google Maps</label>
										<input id="buscar" name="buscar" type="text" value="" class="form-control" data-validation="required" autocomplete="off"/>
										<span class="bar"></span>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
									<button type="button" id="search" class="btn btn-primary">
										<i class="fa fa-search" aria-hidden="true"></i>
										<span>Buscar</span>
									</button>
								</div>
							</div>
						</form>
					</div>
					<div id="mapa"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- ===============================================-->
	<!--    JavaScripts-->
	<!-- ===============================================-->
	<?PHP
		include '../../inc/footer.php'
	?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhfDYSXXsN_28xWd2DQ4TqUNw5IKh_t7s&callback" async defer></script>
	<script type="text/javascript" src="../../assets/js/myGoogleMaps.js"></script>

	<script type="text/javascript" src="../../assets/js/scripts/employe.js"></script>

	<script>
		$(document).ready(function () {


		});

		lightbox.option({
			'resizeDuration': 200,
			'wrapAround': true
		})

		var myModal = document.getElementById('modalMap');

		myModal.addEventListener('shown.bs.modal', function () {
			//initMapEdit('mapa','', '');
		})
	</script>

	<!-- The template to display files available for upload -->
	<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-upload fade">
			<td>
				<span class="preview"></span>
			</td>
			<td>
				<p class="name">{%=file.name%}</p>
				<strong class="error text-danger"></strong>
			</td>
			<td>
				<p class="size">Cargando...</p>
				<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
			</td>
			<td>
				{% if (!i && !o.options.autoUpload) { %}
					<button class="btn btn-primary btn-sm start" disabled>
						<i class="fa fa-upload"></i>
						<span>Iniciar</span>
					</button>
				{% } %}
				{% if (!i) { %}
					<button class="btn btn-warning btn-sm cancel">
						<i class="fa fa-ban"></i>
						<span>Cancelar</span>
					</button>
				{% } %}
			</td>
		</tr>
	{% } %}
	</script>
	<!-- The template to display files available for download -->
	<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-download fade">
			<td>
				<span class="preview">
					{% if (file.thumbnailUrl) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
					{% } %}
				</span>
			</td>
			<td>
				<p class="name">
					{% if (file.url) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
					{% } else { %}
						<span>{%=file.name%}</span>
					{% } %}
				</p>
				{% if (file.error) { %}
					<div><span class="label label-danger">Error</span> {%=file.error%}</div>
				{% } %}
			</td>
			<td>
				<span class="size">{%=o.formatFileSize(file.size)%}</span>
			</td>
			<td>
				{% if (file.deleteUrl) { %}
					<button class="btn btn-danger btn-sm delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
					<i class="fa fa-trash"></i>
						<span>Borrar</span>
					</button>
					<input type="checkbox" name="delete" value="1" class="toggle">
				{% } else { %}
					<button class="btn btn-warning btn-sm cancel">
						<i class="fa fa-ban"></i>
						<span>Cancelar</span>
					</button>
				{% } %}
			</td>
		</tr>
	{% } %}
	</script>
	</body>

</html>