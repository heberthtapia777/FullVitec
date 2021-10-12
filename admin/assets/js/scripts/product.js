var validator;
$( document ).ready(function() {
    init();
	var tabla;
	ComboCategory();
	ComboBrand();
	ComboUnidadMedida();

	validator = $("#frmProduct").validate({
		ignore: "",
		rules: {
			cboCategory: "required",
			cboBrand: "required",
			cboUnidadMedida: "required",
			txtProduct: "required",
			txtModel: "required",
			txtSummary: "required",
			txtDetails: "required",
			txtPricePlata: "required",
			txtPriceOro: "required",
			txtEstado: "required",
		},
		messages: {
			txtEmail: "Por favor, introduce una dirección de correo válida"
		},
		errorElement: "em",
		errorPlacement: function(label, element) {
			// Add the `invalid-feedback` class to the label element
			label.addClass( "invalid-feedback" );

			if ( element.prop( "type" ) === "checkbox" ) {
				label.insertAfter( element.next() );
			} else {
				//label.insertAfter( element );
				// position label label after generated textarea
				if (element.is("textarea")) {
					label.insertAfter(element.next());
				} else {
					label.insertAfter(element)
				}
			}
		},
		highlight: function ( error, errorClass, validClass ) {
			$( error ).addClass( "is-invalid" ).removeClass( "is-valid" );
		},
		unhighlight: function (error, errorClass, validClass) {
			$( error ).addClass( "is-valid" ).removeClass( "is-invalid" );
		}

	})
});

/**
 * Carga editor TINYMCE
 */

 function cargaEditor(){

    tinymce.init({
        selector: '#txtSummary, #txtDetails',
		valid_children : '+div[style]',
        language: 'es',
        height : "280",
        plugins: 'print preview importcss searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',

        mobile: {
        plugins: 'print preview importcss searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount textpattern noneditable help charmap emoticons'
        },

        menubar: ' edit view format table tc help',
        toolbar: 'undo redo | bold italic underline strikethrough | formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print',
        autosave_ask_before_unload: true,

        setup: function(editor) {
            editor.on('change', function(e) {
                tinymce.triggerSave();
                $("#" + editor.id).valid();
            });
        }
    });
}

function init(){
	listadoTabla();// Ni bien carga la pagina que cargue el metodo

	$("#btnNuevo").click(function() {
		VerForm();
		uploadFile('frmProduct','');
	});
}

function uploadFile(nameForm,id) {
	//UPLOAD FILES
	'use strict';
	// Initialize the jQuery File Upload widget:
	$('#'+nameForm).fileupload({
		// Uncomment the following to send cross-domain cookies:
		//xhrFields: {withCredentials: true},
		url: '../../modulo/product/uploads/?idFile='+id,
		disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
		imageMaxWidth: 500,
		imageMaxHeight: 490,
		imageCrop: true, // Force cropped images
		maxFileSize: 999000,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		limitMultiFileUploads: 5,
		maxNumberOfFiles: 5
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

$.validator.setDefaults( {
    submitHandler: function () {
        //var formData = new FormData($("#frmProduct")[0]);

		var dato = JSON.stringify( $('#frmProduct').serializeObject() );

        $.ajax({
			url: "../../ajax/productAjax.php?op=SaveOrUpdate",
			type: 'POST',
			dataType: 'JSON',
			async: true,
			data: {res:dato},
			success: function(data){

				var hoy = new Date();
				var fecha = hoy.getFullYear() + '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getDate();
				var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
				var fechaYHora = fecha + ' ' + hora;

            /*url: "../../ajax/employeAjax.php?op=SaveOrUpdate",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){*/
                if(data.txtIdProduct == ''){
					if (data != 0) {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'PRODUCTO registrado exitosamente.',
							showConfirmButton: false,
							timer: 2000
						}).then((result) => {
							img = '<a href="../../modulo/product/uploads/files/'+data.txtFoto+'" data-lightbox="image-'+data.lastId+'" ><img src="../../modulo/product/uploads/files/thumbnail/'+data.txtFoto+'"></a>';

							button = '<button id="'+data.lastId+'" class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataProduct('+data.lastId+')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'+
							'<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="eliminarProduct('+data.lastId+')"><i class="fas fa-trash"></i> </button>';

							$('#tblProduct > tbody').prepend(''+
							'<tr id="'+data.lastId+'">'+
							'<td>1</td>'+
							'<td>'+data.nameCategory+'</td>'+
							'<td>'+data.nameBrand+'</td>'+
							'<td>'+data.txtProduct+'</td>'+
							'<td>'+data.txtModel+'</td>'+
							'<td>'+data.txtSummary+'</td>'+
							'<td>'+img+'</td>'+
							'<td>'+data.txtPricePlata+'</td>'+
							'<td>'+data.txtPriceOro+'</td>'+
							'<td>'+fechaYHora+'</td>'+
							'<td></td>'+
							'<td>'+button+'</td>'+
							'</tr>');
							enumera(1);
							Limpiar();
							OcultarForm();
							validator.resetForm();
						})
					}else{
						Swal.fire({
							position: 'top-end',
							icon: 'error',
							title: 'Error al registrar PRODUCTO.',
							showConfirmButton: false,
							timer: 2000
						})
					}
                }else{
					if(data != 0){
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'PRODUCTO actualizado correctamente.',
							showConfirmButton: false,
							timer: 2000
						}).then((result) => {
							/* Read more about isConfirmed, isDenied below */
							//listadoTabla();

							img = '<a href="../../modulo/product/uploads/files/'+data.txtFoto+'" data-lightbox="image-'+data.txtIdProduct+'" ><img src="../../modulo/product/uploads/files/thumbnail/'+data.txtFoto+'"></a>';

							button = '<button id="'+data.txtIdProduct+'" class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataProduct('+data.txtIdProduct+')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'+
							'<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="eliminarProduct('+data.txtIdProduct+')"><i class="fas fa-trash"></i> </button>';

							var v = new Array();

							v = [data.txtIdProduct,data.nameCategory,data.nameBrand,data.txtProduct,data.txtModel,data.txtSummary,img,data.txtPricePlata,data.txtPriceOro,'',fechaYHora,button];

							var c = 0;

							$("button#"+data.txtIdProduct).closest('tr').each(function(index, element) {
								$(this).find('td').each(function () {
									//alert($(this).html()); //funciona aqui cargar los datos
									if (c==0) {
										$(this).html()
									}else{
										if (v[c] != ''){
											$(this).html(v[c]);
										}
									}
									c++;
								})
							});
							//enumera(1);
							Limpiar();
							OcultarForm();
						})
					}else{
						Swal.fire({
							position: 'top-end',
							icon: 'error',
							title: 'Error al actulizar EMPLEADO.',
							showConfirmButton: false,
							timer: 2000
						})
					}
                }

            }

        });
    }
} );

function ComboCategory(){
	$.post("../../ajax/productAjax.php?op=listCategory", function(r){
		$("#cboCategory").html(r);
	});
}

function ComboBrand(){
	$.post("../../ajax/productAjax.php?op=listBrand", function(r){
		$("#cboBrand").html(r);
	});
}

function ComboUnidadMedida(){
	$.post("../../ajax/productAjax.php?op=listUnidadMedida", function(r){
		$("#cboUnidadMedida").html(r);
	});
}

/** RE-ENUMERA FILAS */
function enumera(i){
	$('#tblProduct tbody').find('tr').each(function(index, element) {
		if (i%2 == 0) {
			$(this).removeAttr("class");
			$(this).addClass('even');
		}else{
			$(this).removeAttr("class");
			$(this).addClass('odd');
		}

		$(this).find('td').eq(0).text(i);
		i++;
	});
}

function Limpiar(){
	$("#frmProduct")[0].reset();
	validator.resetForm();
	$("#frmProduct").find('input').removeClass('is-valid');
	$("#frmProduct").find('select').removeClass('is-valid');
	$("table#upload tbody").html('');
	tinymce.remove();
}

function VerForm(){
	$("#verForm").show("slow", function () {
		$(this).find('h5').html('Nuevo Producto');
		$('#btnCancel').css('display','block');
		$('#btnNuevo').css('display', 'none');
	});// Mostramos el formulario
	$("#verLista").hide();// ocultamos el listado
	cargaEditor();
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
	tabla = $('#tblProduct').dataTable(
		{   "aProcessing": true,
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
                    {"mDataProp": "6"},
					{"mDataProp": "7"},
					{"mDataProp": "8"},
					{"mDataProp": "9"},
					{"mDataProp": "10"},
					{"mDataProp": "11"}

        	],"ajax":
	        	{
	        		url: '../../ajax/productAjax.php?op=list',
					type : "get",
					dataType : "json",
					error: function(e){
				   		console.log(e.responseText);
					}
	        	},
	        "bDestroy": true

    	}).DataTable();
};

function eliminarProduct(id){
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
			$.post("../../ajax/productAjax.php?op=delete", {id : id}, function(e){// llamamos la url de eliminar por post. y mandamos por parametro el id
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

function cargarDataProduct(idProduct){
	tinymce.remove();
	$.ajax({
		type: "POST",
		dataType: 'json',
		url: "../../ajax/productAjax.php?op=cargaDataEdit",
		cache: false,
		data: 'idProduct='+idProduct,
		success: function (data) {
			var value = $('button#'+idProduct).closest('tr').find('td:first').html();

			VerForm();// mostramos el formulario
			$("#txtIdProduct").val(data.idProduct).closest('div').addClass('focused');
			$("#cboCategory").val(data.cboCategory).closest('div').addClass('focused');
			$("#cboBrand").val(data.cboBrand).closest('div').addClass('focused');
			$("#cboUnidadMedida").val(data.cboMedida).closest('div').addClass('focused');
			$("#txtProduct").val(data.txtProduct).closest('div').addClass('focused');
			$("#txtModel").val(data.txtModel).closest('div').addClass('focused');
			$("#txtSummary").val(data.txtSummary).closest('div').addClass('focused');
			$("#txtDetails").val(data.txtDetails).closest('div').addClass('focused');
			$("#txtPricePlata").val(data.txtPricePlata).closest('div').addClass('focused');
			$("#txtPriceOro").val(data.txtPriceOro).closest('div').addClass('focused');
			$("#txtEstado").val(data.txtEstado).closest('div').addClass('focused');
			$("#numRow").val(value);
			cargaEditor();

			uploadFile('frmProduct',idProduct);
			validator.resetForm();
		}
	});

}
