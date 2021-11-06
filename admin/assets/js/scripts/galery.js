var validator;
$( document ).ready(function() {
    init();
	var tabla;
	ComboCategory();

	validator = $("#frmGalery").validate({
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

		var dato = JSON.stringify( $('#frmGalery').serializeObject() );

        $.ajax({
			url: "../../ajax/galeryAjax.php?op=SaveOrUpdate",
			type: 'POST',
			dataType: 'JSON',
			async: true,
			data: {res:dato},
			success: function(data){
				if(data.txtIdGalery == ''){
					if (data != 0) {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Mensaje del Sistema',
							text: 'GALERIA DE FOTOS Registrada Exitosamente.',
							showConfirmButton: false,
							timer: 2000
						}).then(() => {
							OcultarForm();
							Limpiar();
							listadoTabla();
						})
					}else{
						Swal.fire({
							position: 'top-end',
							icon: 'error',
							title: 'Error al Registrar GALERIA.',
							showConfirmButton: false,
							timer: 2000
						})
					}
				}else{
					if (data != 0) {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Mensaje del Sistema',
							text: 'GALERIA DE FOTOS Actualizada Exitosamente.',
							showConfirmButton: false,
							timer: 2000
						}).then(() => {
							OcultarForm();
							Limpiar();
							listadoTabla();
						})
					}else{
						Swal.fire({
							position: 'top-end',
							icon: 'error',
							title: 'Error al Actualizar GALERIA.',
							showConfirmButton: false,
							timer: 2000
						})
					}
				}
			}
		})
	}
});

function init(){
	listadoTabla();// Ni bien carga la pagina que cargue el metodo

	$("#btnNuevo").click(function() {
		VerForm('Nueva Galeria de Fotos');
		uploadFile('frmGalery','');
	});
}

function uploadFile(nameForm,id) {
	//UPLOAD FILES
	'use strict';
	// Initialize the jQuery File Upload widget:
	$('#'+nameForm).fileupload({
		// Uncomment the following to send cross-domain cookies:
		//xhrFields: {withCredentials: true},
		url: '../../modulo/galery/uploads/?idFile='+id,
		disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
		imageMaxWidth: 500,
		imageMaxHeight: 490,
		imageCrop: false, // Force cropped images
		maxFileSize: 999000,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		limitMultiFileUploads: 10,
		maxNumberOfFiles: 10
	});
	$('#'+nameForm).bind('fileuploadadded', function (e, data) {
		$.each(data.files, function (index, file) {
			//$('#update').attr('disabled', 'disabled');
			console.log('Added file: ' + file.name);
			$('#send').attr('disabled','disabled');
		});
	})
	$('#'+nameForm).bind('fileuploadcompleted', function (e, data) {
		$.each(data.files, function (index, file) {
			console.log('Added file: ' + file.name);
			//saveImg('producto', file.name, file.size);
			//loadImg('producto', 'auxImgEmp');
			//$('#update').removeAttr('disabled');
			$('#send').removeAttr('disabled');
		});
	})

	$('#'+nameForm).bind('fileuploaddestroy', function (e, data) {
		/*var cont = 0;
		$('#upload tr input').each(function(index, element){
			cont++;
		});
		if(cont == 1)
			$('#update').removeAttr('disabled');*/
	});

	$('#'+nameForm).bind('fileuploadfailed', function (e, data) {
		//alert('cancelado');
	});

	$('#'+nameForm).addClass('fileupload-processing');
		$.ajax({
			// Uncomment the following to send cross-domain cookies:
			//xhrFields: {withCredentials: true},
			url: $('#'+nameForm).fileupload('option', 'url'),
			dataType: 'json',
			//async:false,
			context: $('#'+nameForm)[0]
		}).always(function () {
			$(this).removeClass('fileupload-processing');
		}).done(function (result) {
			$(this).fileupload('option', 'done')
					.call(this, $.Event('done'), {result: result});
		});
	}

function ComboCategory(){
	$.post("../../ajax/productAjax.php?op=listCategory", function(r){
		$("#cboCategory").html(r);
	});
}

function Limpiar(){
	$("#frmGalery")[0].reset();
	validator.resetForm();
	$("#frmGalery").find('input').removeClass('is-valid');
	$("#frmGalery").find('select').removeClass('is-valid');
	$("table#upload tbody").html('');

	$("#txtIdGalery").val('')
}

function VerForm(msj){
	$("#verForm").show("slow", function () {
		$(this).find('h5').html(msj);
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

function listadoTabla(){
	OcultarForm();
	tabla = $('#tblGalery').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"scrollX": true,
		'order' : [[0,'asc']],
		language: {
			url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
		},
		"aoColumns":[
			{"mDataProp": "0"},
			{"mDataProp": "1"},
			{"mDataProp": "2"},
			{"mDataProp": "3"},
			{"mDataProp": "4"},
			{"mDataProp": "5"},
			{"mDataProp": "6"}

		],"ajax":
		{
			url: '../../ajax/galeryAjax.php?op=list',
			type : "get",
			dataType : "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy": true

	}).DataTable();
};

function eliminarGalery(id){
	Swal.fire({
		title: "¿Está seguro?",
		text: "Una vez eliminado, ¡no podrá recuperar este registro!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí, elimínelo!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.post("../../ajax/galeryAjax.php?op=delete", {id : id}, function(e){// llamamos la url de eliminar por post. y mandamos por parametro el id
				Swal.fire({
					position: 'top-end',
					title: 'Borrado!',
					text: 'Su registro ha sido eliminado.',
					icon: 'success',
					showConfirmButton: false,
					timer: 3000
				});
				listadoTabla();
            });
		}
	})
}

function cargarDataGalery(idGalery){
	$.ajax({
		type: "POST",
		dataType: 'json',
		url: "../../ajax/galeryAjax.php?op=cargaDataEdit",
		cache: false,
		data: 'idGalery='+idGalery,
		success: function (data) {
			var value = $('button#'+idGalery).closest('tr').find('td:first').html();

			VerForm('Editar Galeria de Fotos');// mostramos el formulario

			$("#txtIdGalery").val(idGalery).closest('div').addClass('focused');
			$("#cboCategory").val(data.cboCategory).closest('div').addClass('focused');
			$("#txtTitle").val(data.txtTitle).closest('div').addClass('focused');

			$("#txtEstado").val(data.txtEstado).closest('div').addClass('focused');
			$("#numRow").val(value);

			uploadFile('frmGalery',idGalery);

			validator.resetForm();
		}
	});

}
