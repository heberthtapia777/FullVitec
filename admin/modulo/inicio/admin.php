<?php 
	require "../../inc/conexion.php";
	
	$consulta_eventos = "SELECT id, title, description, label, start, end, allday FROM event";	
	$resultado_eventos = $db->Execute($consulta_eventos);
?>
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
        <div class="row g-0">		
            <div class="col-lg-12 col-xl-12 col-xxl-12 mb-3">
                <div class="card h-lg-100">
                    <div class="bg-holder bg-card" style="background-image:url(../../assets/img/illustrations/corner-1.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h5 class="text-warning">Bienvenido al Administrador de Contenidos</h5>
                        <p class="fs--1 mb-0">El administrador de contenidos o CMS (Content Management System) <br> es una aplicacion en línea que le permite administrar todos los contenidos de su sitio web.</p>
                        <!-- <a class="btn btn-link fs--1 text-warning mt-4 mt-lg-3 pl-0" href="#!">Upgrade storage<span class="fas fa-chevron-right ml-1" data-fa-transform="shrink-4 down-1"></span></a> -->                        
                    </div>					
                </div>
            </div>            
        </div>	

		<div class="card mb-3">
			<div class="card-header">
				<h5>Agenda Personal</h5>
			</div>
			<div class="card-body p-0">
			<div id="appCalendar"></div>
			</div>
		</div>

		<div class="modal fade" id="eventDetailsModal" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content border">
					<div class="modal-header bg-light pl-card pr-5 border-bottom-0">
						<div>
						<h5 class="modal-title mb-0"></h5>						
						</div>
						<button type="button" class="btn-close position-absolute right-0 top-0 mt-3 mr-3" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body px-card pb-card pt-1 fs--1">						
						<div class="d-flex mt-3">							
							<span class="fa-stack ml-n1 mr-3">
								<i class="fas fa-align-left fa-stack-1x text-primary" data-fa-transform="undefined"></i> 
							</span>						
							<div class="flex-1">
								<h6>Descripcíon</h6>
								<p class="mb-0"></p>
							</div>
						</div>						
						<div class="d-flex mt-3">						
							<span class="fa-stack ml-n1 mr-3">
								<i class="fas fa-calendar-check fa-stack-1x text-primary" data-fa-transform="undefined"></i>
							</span>						
							<div class="flex-1">
								<h6>Fecha y hora</h6>
								<p class="mb-1">
									<span id="start"></span>
									<span id="end"></span>
								</p>
							</div>
						</div>						
					</div>					
					<div class="modal-footer d-flex justify-content-end bg-light px-card border-top-0">
						<a href="#" id="edit" class="btn btn-falcon-primary btn-sm">
							<span class="fas fa-pencil-alt fs--2 mr-2"></span> Edit
						</a>
						<a href="#" id="del" class="btn btn-falcon-danger btn-sm">						
							<span class="fas fa-trash-alt fs--2 ml-1"></span> Borrar
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="addEventModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content border">					
						<div class="modal-header px-card bg-light border-bottom-0">
							<h5 class="modal-title">Nuevo Evento</h5><button class="btn-close mr-n1" type="button" data-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-card">
							<form role="form" class="floating-labels" id="addEventForm" autocomplete="off">
								<div class="form-group has-primary m-b-40">
									<label class="fs-0" for="eventTitle">Titulo</label>
									<input class="form-control" id="eventTitle" type="text" name="title" required="required" />
									<span class="bar"></span>
								</div>
								<div class="form-group has-primary m-b-40">
									<label class="fs-0" for="eventStartDate">Fecha Inicio</label>
									<input class="form-control datetimepicker" id="eventStartDate" type="text" required="required" name="startDate" placeholder="YYYY-MM-DD HH:mm" data-options='{"static":"true","enableTime":"true","time_24hr":"true","dateFormat":"Y-m-d H:i"}' />
									<span class="bar"></span>
								</div>
								<div class="form-group has-primary mb-3">
									<label class="fs-0" for="eventEndDate">Fecha Final</label>
									<input class="form-control datetimepicker" id="eventEndDate" type="text" name="endDate" placeholder="YYYY-MM-DD HH:mm" data-options='{"static":"true","enableTime":"true","time_24hr":"true","dateFormat":"Y-m-d H:i"}' />
									<span class="bar"></span>
								</div>
								<div class="form-group has-primary m-b-40 form-check">
									<input class="form-check-input" type="checkbox" id="eventAllDay" name="allDay" value="1" />
									<label class="form-check-label" for="eventAllDay">Todo el Dia</label>
								</div>
								<!-- <div class="mb-3"> 
									<label class="fs-0">Schedule Meeting</label>
									<div>
										<a class="btn bg-soft-info text-left text-info" href="#!"><span class="fas fa-video mr-2"></span>Add video conference link</a>
									</div>
								</div> -->
								<div class="form-group has-primary m-b-40">
									<label class="fs-0" for="eventDescription">Descripción</label>
									<textarea class="form-control" rows="3" name="description" id="eventDescription"></textarea>
									<span class="bar"></span>
								</div>
								<div class="form-group has-primary m-b-40">
									<label class="fs-0" for="eventLabel">Etiqueta</label>
									<select class="form-control" id="eventLabel" name="label">
										<option value="" selected="selected">None</option>
										<option value="primary">Empresa</option>
										<option value="danger">Importante</option>
										<option value="success">Personal</option>
										<option value="warning">Reunion</option>
									</select>
									<span class="bar"></span>
								</div>
							</form>
						</div>
						<div class="card-footer d-flex justify-content-end align-items-center bg-light">							
							<button class="btn btn-primary btn-sm px-4" type="submit">Guardar</button>
						</div>
					
				</div>
			</div>
		</div>

		<div class="modal fade" id="editEventModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content border">
					<form class="floating-labels" id="editEventForm" autocomplete="off">
						<div class="modal-header px-card bg-light border-bottom-0">
							<h5 class="modal-title">Edita Evento</h5><button class="btn-close mr-n1" type="button" data-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-card">
							<div class="form-group has-primary m-b-40">
								<input type="hidden" id="eventId" name="id">
								<label class="fs-0" for="eventTitle">Titulo</label>
								<input class="form-control" id="eventTitle" type="text" name="title" required="required" />
								<span class="bar"></span>
							</div>
								<div class="form-group has-primary m-b-40">
									<label class="fs-0" for="eventStartDate">Fecha Inicio</label>
									<input class="form-control datetimepicker" id="eventStartDate" type="text" required="required" name="startDate" placeholder="YYYY-MM-DD HH:mm" data-options='{"static":"true","enableTime":"true","time_24hr":"true","dateFormat":"Y-m-d H:i"}' />
									<span class="bar"></span>
								</div>
								<div class="form-group has-primary mb-3">
									<label class="fs-0" for="eventEndDate">Fecha Final</label>
									<input class="form-control datetimepicker" id="eventEndDate" type="text" name="endDate" placeholder="YYYY-MM-DD HH:mm" data-options='{"static":"true","enableTime":"true","time_24hr":"true","dateFormat":"Y-m-d H:i"}' />
									<span class="bar"></span>
								</div>
								<div class="form-group has-primary m-b-40 form-check">
									<input class="form-check-input" type="checkbox" id="eventAllDay" name="allDay" value="1" />
									<label class="form-check-label" for="eventAllDay">Todo el Dia</label>
								</div>
								<!-- <div class="form-group has-primary m-b-40"> 
									<label class="fs-0">Schedule Meeting</label>
									<div>
										<a class="btn bg-soft-info text-left text-info" href="#!"><span class="fas fa-video mr-2"></span>Add video conference link</a>
									</div>
								</div> -->
							<div class="form-group has-primary m-b-40">
								<label class="fs-0" for="eventDescription">Descripción</label>
								<textarea class="form-control" rows="3" name="description" id="eventDescription"></textarea>
								<span class="bar"></span>
							</div>
							<div class="form-group has-primary m-b-40">
								<label class="fs-0" for="eventLabel">Etiqueta</label>
								<select class="form-control" id="eventLabel" name="label">
									<option value="" selected="selected">None</option>
									<option value="primary">Empresa</option>
									<option value="danger">Importante</option>
									<option value="success">Personal</option>
									<option value="warning">Reunion</option>
								</select>
								<span class="bar"></span>
							</div>
						</div>
						<div class="card-footer d-flex justify-content-end align-items-center bg-light">							
							<button class="btn btn-primary btn-sm px-4" type="submit">Actualizar</button>
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
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->



<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<?PHP
    include '../../inc/footer.php'
?>

<script>
	var none 	= ["#9da9bb","#EDF2F9"];
	var primary	= ["#1862c6","#E6EFFC"];
	var danger	= ["#d01a3b","#FCE7EB"];
	var success = ["#009f5c","#e0faef"];
	var warning = ["#f2600e","#fef0e8"];
	$(document).ready(function() {
		$(".datetimepicker").flatpickr({
			"locale": "es","enableTime":"true","time_24hr":"true","dateFormat":"Y-m-d H:i"
		});
		calendar();		
	});

	function calendar(){
		$('#appCalendar').fullCalendar({
		header: {
			left: 'prev,next custom',
			center: 'title',			
			right: 'month,agendaWeek,agendaDay,listWeek'
		},
		customButtons: {
			custom: {
				text: 'Nuevo Evento',
				click: function() {												
					$('#addEventModal').modal('show');
					$( "#addEventForm" ).submit(function( event ) {
						event.preventDefault();
						event.stopImmediatePropagation();
						saveEvent();					
					});
				}
			}
		},
		defaultDate: new Date(),
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		eventClick: function(event) {			
			$('#eventDetailsModal #id').text(event.id);
			$('#eventDetailsModal .modal-title').text(event.title);
			$('#eventDetailsModal .modal-body .mb-0').text(event.description);
			$('#eventDetailsModal .modal-body .mb-1 #start').text(event.start.format('YYYY-MM-DD HH:mm'));
			$('#eventDetailsModal .modal-footer a#edit').attr("onclick","editEvent("+event.id+")");
			$('#eventDetailsModal .modal-footer a#del').attr("onclick","deletEvent("+event.id+")");
			if(event.end){
				$('#eventDetailsModal .modal-body .mb-1 #end').text(' - '+event.end.format('YYYY-MM-DD HH:mm'));
			}else{
				$('#eventDetailsModal .modal-body .mb-1 #end').text('');
			}				
			$('#eventDetailsModal').modal('show');
			return false;
		},			
		selectable: true,
		selectHelper: true,
		select: function(start, end){
			$('#addEventModal #eventStartDate').val(moment(start).format('YYYY-MM-DD HH:mm:ss')).closest('div').addClass('focused');
			$('#addEventModal #eventLabel').closest('div').addClass('focused');
			
			$('#addEventModal').modal('show');

			$( "#addEventForm" ).submit(function( event ) {
				//alert( "Handler for .submit() called." );
				event.preventDefault();
				event.stopImmediatePropagation();
				saveEvent();					
			});				
		},
		events: [
			<?php
				$none 		= array("#9da9bb","#EDF2F9");				
				$primary	= array("#1862c6","#E6EFFC");				
				$danger		= array("#d01a3b","#FCE7EB");				
				$success 	= array("#009f5c","#e0faef");				
				$warning 	= array("#f2600e","#fef0e8");
				
				while($row = $resultado_eventos->FetchRow()){					
					if($row['label'] == ""){$colortext = $none[0]; $backcolor = $none[1];};
					if($row['label'] == "primary"){$colortext = $primary[0]; $backcolor = $primary[1];};
					if($row['label'] == "danger"){$colortext = $danger[0]; $backcolor = $danger[1];};						
					if($row['label'] == "success"){$colortext = $success[0]; $backcolor = $success[1];};
					if($row['label'] == "warning"){$colortext = $warning[0]; $backcolor = $warning[1];};

					if($row['allday'] == 1){
						$date = explode(" ", $row['start'] );
						$row['start']  = $date[0];
						$row['end'] = "";
					}
			?>
					{id: '<?php echo $row['id']; ?>',
					title: '<?php echo $row['title']; ?>',
					description: '<?php echo $row['description']; ?>',
					start: '<?php echo $row['start']; ?>',
					end: '<?php echo $row['end']; ?>',
					textColor: '<?php echo $colortext ?>',
					backgroundColor: '<?php echo $backcolor ?>',
					borderColor: '<?php echo $backcolor ?>'
					},
			<?php
				}
			?>
		]
		});
	}

	function saveEvent(){
		var dato = JSON.stringify( $('#addEventForm').serializeObject());		
		$.ajax({
			url: "saveEvent.php",
			type: 'POST',
			dataType: 'JSON',
			async: false,
			data: {res:dato},
			success: function(data){						
				if(data.label == ""){colortext = none[0]; backcolor = none[1]};
				if(data.label == "primary"){colortext = primary[0]; backcolor = primary[1]};
				if(data.label == "danger"){colortext = danger[0]; backcolor = danger[1]};						
				if(data.label == "success"){colortext = success[0]; backcolor = success[1]};
				if(data.label == "warning"){colortext = warning[0]; backcolor = warning[1]};

				if(data.allDay == '1'){
					date = data.startDate.split(' ');
					data.startDate = date[0];
					data.endDate = "";
				}
				
				if (data.title) {							
					eventData = {
						id: data.id,
						title: data.title,
						start: data.startDate,
						end: data.endDate,
						textColor: colortext,
						backgroundColor: backcolor,
						borderColor: backcolor
					};
					$('#appCalendar').fullCalendar('renderEvent', eventData, true); // stick? = true
					$('#addEventModal').modal('hide');
				}
			}
		})
	}
	function editEvent(id) {
		$('#eventDetailsModal').modal('hide');
		$('#editEventModal').modal('show');
		//var dato = JSON.stringify( $('#addEventForm').serializeObject());		
		$.ajax({
			url: "selecEvent.php",
			type: 'POST',
			dataType: 'JSON',
			async: false,
			data: {
				id: id
			},
			success: function(data){
				$('#editEventModal #eventId').val(data.id);
				$('#editEventModal #eventTitle').val(data.title).closest('div').addClass('focused');
				$('#editEventModal #eventStartDate').val(data.startDate).closest('div').addClass('focused');

				if(data.endDate != '0000-00-00 00:00:00'){
					//$('#eventDetailsModal .modal-body .mb-1 #end').text(' - '+event.end.format('YYYY-MM-DD HH:mm'));
					$('#editEventModal #eventEndDate').val(data.endDate).closest('div').addClass('focused');
				}else{
					$('#editEventModal #eventEndDate').val('');
				}				

				$('#editEventModal #eventDescription').val(data.description).closest('div').addClass('focused');
				if (data.allDay == 1) {
					$('#editEventModal #eventAllDay').attr('checked','checked');
				}else{
					$('#editEventModal #eventAllDay').removeAttr('checked','checked');
				}
				$('#editEventModal #eventLabel').val(data.label).closest('div').addClass('focused');		
				
			}
		})
	}

	$( "#editEventForm" ).submit(function( event ) {
		//alert( "Handler for .submit() called." );
		event.preventDefault();
		event.stopImmediatePropagation();
		updateEvent();					
	});

	function updateEvent(){
		var dato = JSON.stringify( $('#editEventForm').serializeObject());		
		$.ajax({
			url: "editEvent.php",
			type: 'POST',
			dataType: 'JSON',
			async: false,
			data: {res:dato},
			success: function(data){						
				if(data.label == ""){colortext = none[0]; backcolor = none[1]};
				if(data.label == "primary"){colortext = primary[0]; backcolor = primary[1]};
				if(data.label == "danger"){colortext = danger[0]; backcolor = danger[1]};						
				if(data.label == "success"){colortext = success[0]; backcolor = success[1]};
				if(data.label == "warning"){colortext = warning[0]; backcolor = warning[1]};

				if(data.allDay == '1'){
					date = data.startDate.split(' ');
					data.startDate = date[0];
					data.endDate = "";
				}				
				if (data.title) {							
					eventData = {
						id: data.id,
						title: data.title,
						start: data.startDate,
						end: data.endDate,
						textColor: colortext,
						backgroundColor: backcolor,
						borderColor: backcolor
					};
					$('#appCalendar').fullCalendar('removeEvents', data.id );
					$('#appCalendar').fullCalendar('renderEvent', eventData, true); // stick? = true
					$('#editEventModal').modal('hide');
				}
			}
		})
	}
	function deletEvent(id){
		Swal.fire({
			title: "¿Está seguro?",
			text: "Una vez eliminado, ¡no podrá recuperar este evento!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí, elimínelo!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.post("../../ajax/usersAjax.php?op=deleteEvent", {id : id}, function(e){// llamamos la url de eliminar por post. y mandamos por parametro el id
					Swal.fire({
						position: 'top-end',
						title: 'Borrado!',
						text: 'Su evento ha sido eliminado.',
						icon: 'success',
						showConfirmButton: false,
						timer: 3000
					});
					$('#eventDetailsModal').modal('hide');
					/** Elimina evento */
					$('#appCalendar').fullCalendar( 'removeEvents', id );
				});				
			}
		})
	}
</script>
</body>
</html>