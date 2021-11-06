
$( document ).ready(function() {
	ListadoCategorias();

	OcultarForm();

	$("#btnNuevo").click(function() {
		VerForm();
	});

	validator = $("#frmCategory").validate({
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
		$.post("../../ajax/categoryAjax.php?op=SaveOrUpdate", $("form#frmCategory").serialize(), function(r){// llamamos la url por post. function(r). r-> llamada del callback
			//$.toaster({ priority : 'success', title : 'Mensaje', message : r});
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Mensaje del Sistema',
				text: r,
				showConfirmButton: false,
				timer: 1500
			}).then(() => {
				ListadoCategorias();
				OcultarForm();
				Limpiar();
			})
		});
	}
});

function ListadoCategorias(){
	var tabla = $('#tblCategory').dataTable(
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
				url: '../../ajax/categoryAjax.php?op=list',
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
	$("#frmCategory")[0].reset();
	validator.resetForm();
	$("#frmCategory").find('input').removeClass('is-valid');
	$("#txtIdCategory").val('');
}

function VerForm(){
	Limpiar();
	$("#verForm").show("slow", function () {
		$(this).find('h5').html('Nueva Categoria');
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

function cargarDataCategoria(id, nombre, status){
	VerForm();

	$("#txtIdCategory").val(id);
	$("#txtCategory").val(nombre).closest('div').addClass('focused');
	$("#txtEstado").val(status);
}

function eliminarCategoria(id){// funcion que llamamos del archivo ajax/CategoriaAjax.php?op=delete linea 53
	title 	= 'Borrado!';
	msj		= 'La Categoria se a Eliminado';
	icon 	= 'success';

	Swal.fire({
		title: "¿Está seguro?",
		text: "Una vez eliminado, ¡no podrá recuperar la Categoria!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, elimínelo!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.post("../../ajax/categoryAjax.php?op=delete", {id : id}, function(e){
				if(e != 1){
					title = 'Error!';
					msj = 'La Categoria no se a Eliminado';
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
					ListadoCategorias();
				})
			});
		}
	})
}