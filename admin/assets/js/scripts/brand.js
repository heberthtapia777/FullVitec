
$( document ).ready(function() {
	ListBrand();
	OcultarForm();

	$("#btnNuevo").click(function() {
		VerForm();
	});

	validator = $("#frmBrand").validate({
		errorElement: "em",
		errorPlacement: function(label, element) {
			// Add the `invalid-feedback` class to the label element
			label.addClass( "invalid-feedback" );
			label.insertAfter(element);
		}
	});

});

$.validator.setDefaults( {
    submitHandler: function () {
		//e.preventDefault();// para que no se recargue la pagina
		$.post("../../ajax/brandAjax.php?op=SaveOrUpdate", $("form#frmBrand").serialize(), function(r){// llamamos la url por post. function(r). r-> llamada del callback
			//$.toaster({ priority : 'success', title : 'Mensaje', message : r});
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Mensaje del Sistema',
				text: r,
				showConfirmButton: false,
				timer: 1500
			}).then(() => {
				ListBrand();
				OcultarForm();
				Limpiar();
			})
		});
	}
});

function ListBrand(){
	var tabla = $('#tblBrand').dataTable(
	{   "aProcessing": true,
		"aServerSide": true,
		language: {
			url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
		},
		dom: 'Bfrtip',
		buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		],
		"aoColumns":[
			{   "mDataProp": "id"},
			{   "mDataProp": "1"},
			{   "mDataProp": "2"},
			{   "mDataProp": "3"},
			{   "mDataProp": "4"},
			{   "mDataProp": "5"}

		],"ajax":
			{
				url: '../../ajax/brandAjax.php?op=list',
				type : "get",
				dataType : "json",
				error: function(e){
					console.log(e.responseText);
				}
			},
		"bDestroy": true

	}).DataTable();
}

function Limpiar(){
	$("#frmBrand")[0].reset();
	validator.resetForm();
	$("#frmBrand").find('input').removeClass('is-valid');
	$("#txtIdBrand").val('');
}

function VerForm(){
	$("#verForm").show("slow", function () {
		$(this).find('h5').html('Nueva Marca');
		$('#btnCancel').css('display','block');
		$('#btnNuevo').css('display', 'none');
	});// Mostramos el formulario
	$("#verLista").hide();// ocultamos el listado
}

function OcultarForm(){
	$("#verForm").hide();// Mostramos el formulario
	//$("#btnNuevo").show();// ocultamos el boton nuevo
	$('#btnCancel').css('display', 'none');
	$('#btnNuevo').css('display', 'block');
	$("#verLista").show();	
}

function cancelar() {
	Limpiar();
	OcultarForm();
}

function cargarDataBrand(id, nombre, status){
	VerForm();
	$("#txtIdBrand").val(id);
	$("#txtBrand").val(nombre).closest('div').addClass('focused');
	$("#txtEstado").val(status);
}

function eliminarBrand(id){
	title 	= 'Borrado!';
	msj		= 'La Marca se a Eliminado';
	icon 	= 'success';

	Swal.fire({
		title: "¿Está seguro?",
		text: "Una vez eliminado, ¡no podrá recuperar la Marca!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, elimínelo!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.post("../../ajax/brandAjax.php?op=delete", {id : id}, function(e){
				if(e != 1){
					title = 'Error!';
					msj = 'La Marca no se a Eliminado';
					icon = 'error';
				}
				Swal.fire({
					position: 'top-end',
					title: title,
					text: msj,
					icon: icon,
					showConfirmButton: false,
					timer: 3000
				}).then(() => {
					ListBrand();
				})
			});
		}
	})
}