var validator;
$( document ).ready(function() {
    init();
	var tabla;
	validator = $("#frmEmpleado").submit(function() {
		// update underlying textarea before submit validation
	}).validate({
		ignore: "",
		rules: {
			txtApPaterno: "required",
			//txtApMaterno: "required",
			txtNombre: "required",
			cboTipo_Ducumento: "required",
			txtNum_Documento: {
				required: true,
				remote: "validateCI.php"
			},
			txtEmail: {
				required: true,
				email: true
			},
			txtDireccion: "required",
			txtNumber: "required",
			cx: "required",
			cy: "required",
			txtTelefono: {
				require_from_group: [1, ".phone-group"],
				number: true
			},
			txtCelular: {
				require_from_group: [1, ".phone-group"],
				number: true
			},
			txtFecha_Nacimiento: "required",
			txtEstado: "required",

		},
		messages: {
			txtEmail: "Por favor, introduce una dirección de correo válida.",
			txtTelefono: {
				require_from_group: 'Por favor llene al menos 1 de estos campos',
				number: 'Numero de telefono no valido'
			},
			txtCelular: {
				require_from_group: 'Por favor llene al menos 1 de estos campos',
				number: 'Numero de celular no valido'
			},
			txtNum_Documento: {
				required: 'Este campo es requerido.',
				remote: '# de documento ya registrado'
			}
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

function init(){

	listadoEmpleado();// Ni bien carga la pagina que cargue el metodo

	$("#btnNuevo").click(function() {
		verForm();
		initMapEdit('mapa','', '');
		uploadFile('frmEmpleado','');
	});

}

function uploadFile(nameForm,id) {
	//UPLOAD FILES
	'use strict';
	// Initialize the jQuery File Upload widget:
	$('#'+nameForm).fileupload({
		// Uncomment the following to send cross-domain cookies:
		//xhrFields: {withCredentials: true},
		url: '../../modulo/empleado/uploads/?idFile='+id,
		disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
		//imageMaxWidth: 1200,
		//imageMaxHeight: 800,
		imageCrop: false, // Force cropped images
		maxFileSize: 999000,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		limitMultiFileUploads: 1,
		maxNumberOfFiles: 1
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
    submitHandler: function (){

		var dato = JSON.stringify( $('#frmEmpleado').serializeObject() );

        $.ajax({
			url: "../../ajax/employeAjax.php?op=SaveOrUpdate",
			type: 'POST',
			dataType: 'JSON',
			async: true,
			data: {res:dato},
			success: function(data){
                if(data.txtIdEmpleado == ''){
					if (data != 0) {
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'EMPLEADO registrado exitosamente.',
							showConfirmButton: false,
							timer: 2000
						}).then((result) => {
							img = '<a href="../../modulo/empleado/uploads/files/'+data.txtFoto+'" data-lightbox="image-'+data.lastId+'" ><img src="../../modulo/empleado/uploads/files/thumbnail/'+data.txtFoto+'"></a>';

							button = '<button class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataEmpleado('+data.lastId+',\''+data.txtApPaterno+'\',\''+data.txtApMaterno+'\',\''+data.txtNombre+'\',\''+data.cboTipo_Documento+'\',\''+data.txtNum_Documento+'\',\''+data.txtDireccion+'\',\''+data.txtNumber+'\',\''+data.cx+'\',\''+data.cy+'\',\''+data.txtTelefono+'\',\''+data.txtCelular+'\',\''+data.txtEmail+'\',\''+data.txtFecha_Nacimiento+'\',\''+data.txtEstado+'\')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'+
							'<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="eliminarEmpleado('+data.lastId+')"><i class="fas fa-trash"></i> </button>';

							$('#tblEmpleado > tbody').prepend(''+
							'<tr id="'+data.lastId+'">'+
							'<td>1</td>'+
							'<td>'+data.txtApPaterno+' '+data.txtApMaterno+' '+data.txtNombre+'</td>'+
							'<td>'+data.cboTipo_Documento+'</td>'+
							'<td>'+data.txtNum_Documento+'</td>'+
							'<td>'+data.txtEmail+'</td>'+
							'<td>'+data.txtCelular+'</td>'+
							'<td>'+img+'</td>'+
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
							title: 'Error al registrar EMPLEADO.',
							showConfirmButton: false,
							timer: 2000
						})
					}
                }else{
					if(data != 0){
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'EMPLEADO actualizado correctamente.',
							showConfirmButton: false,
							timer: 2000
						}).then((result) => {

							$("#cboTipo_Documento").removeAttr('disabled','');
							$("#txtNum_Documento").removeAttr('disabled','');

							img = '<a href="../../modulo/empleado/uploads/files/'+data.txtFoto+'" data-lightbox="image-'+data.lastId+'" ><img src="../../modulo/empleado/uploads/files/thumbnail/'+data.txtFoto+'"></a>';

							button = '<button id="'+data.lastId+'" class="btn btn-warning btn-sm mr-1 mb-1" data-toggle="tooltip" title="Editar" onclick="cargarDataEmpleado('+data.lastId+',\''+data.txtApPaterno+'\',\''+data.txtApMaterno+'\',\''+data.txtNombre+'\',\''+data.cboTipo_Documento+'\',\''+data.txtNum_Documento+'\',\''+data.txtDireccion+'\',\''+data.txtNumber+'\',\''+data.cx+'\',\''+data.cy+'\',\''+data.txtTelefono+'\',\''+data.txtCelular+'\',\''+data.txtEmail+'\',\''+data.txtFecha_Nacimiento+'\',\''+data.txtEstado+'\')"><i class="fas fa-pencil-alt"></i> </button>&nbsp;'+
							'<button class="btn btn-danger btn-sm mr-1 mb-1" data-toggle="tooltip" title="Eliminar" onclick="eliminarEmpleado('+data.lastId+')"><i class="fas fa-trash"></i> </button>';

							var v = new Array();

							v = [data.lastId,data.txtApPaterno+' '+data.txtApMaterno+' '+data.txtNombre,data.cboTipo_Documento,data.txtNum_Documento,data.txtEmail,data.txtCelular,img,button];

							var c = 0;

							$("button#"+data.lastId).closest('tr').each(function(index, element) {
								$(this).find('td').each(function () {
									//alert($(this).html()); //funciona aqui cargar los datos
									if (c==0) {
										$(this).html()
									}else{
										$(this).html(v[c]);
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

/** RE-ENUMERA FILAS */
function enumera(i){
	$('#tblEmpleado tbody').find('tr').each(function(index, element) {
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
	$("#frmEmpleado")[0].reset();
	validator.resetForm();
	$("#frmEmpleado").find('input').removeClass('is-valid');
	$("#frmEmpleado").find('select').removeClass('is-valid');
	$("table#upload tbody").html('');
}

function verForm(){
	$("#verForm").show("slow", function () {
		$(this).find('h5').html('Nuevo Empleado');
		$('#btnCancel').css('display','block');
		$('#btnNuevo').css('display', 'none');
	});// Mostramos el formulario
	//$("#btnNuevo").hide();
	$("#verLista").hide();// ocultamos el listado
	Limpiar();
	//initMap();
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

function listadoEmpleado(){
	OcultarForm();
	tabla = $('#tblEmpleado').dataTable(
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
                    {"mDataProp": "7"}

        	],"ajax":
	        	{
	        		url: '../../ajax/employeAjax.php?op=list',
					type : "get",
					dataType : "json",
					error: function(e){
				   		console.log(e.responseText);
					}
	        	},
	        "bDestroy": true

    	}).DataTable();
};

function eliminarEmpleado(id){

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
			$.post("../../ajax/employeAjax.php?op=delete", {id : id}, function(e){// llamamos la url de eliminar por post. y mandamos por parametro el id
                Swal.fire({
					position: 'top-end',
					title: 'Borrado!',
					text: 'Su registro ha sido eliminado.',
					icon: 'success',
					showConfirmButton: false,
					timer: 3000
				});
				listadoEmpleado();
            });
		}
	})

}

function cargarDataEmpleado(id,paterno,materno,name,docType,docNum,address,number,coorX,coorY,phone,celular,email,birthDate,status){

	var value = $('button#'+id).closest('tr').find('td:first').html();
	verForm();// mostramos el formulario

	$("#txtIdEmpleado").val(id);// recibimos la variable id a la caja de texto txtIdCategoria
	$("#txtApPaterno").val(paterno).closest('div').addClass('focused');
	$("#txtApMaterno").val(materno).closest('div').addClass('focused');
	$("#txtNombre").val(name).closest('div').addClass('focused');

	$("#cboTipo_Documento").val(docType).closest('div').addClass('focused');
	$("#cboTipo_Documento").attr('disabled','');

	$("#txtNum_Documento").val(docNum).closest('div').addClass('focused');
	$("#txtNum_Documento").attr('disabled','');

	$("#txtDireccion").val(address).closest('div').addClass('focused');
	$("#txtNumber").val(number).closest('div').addClass('focused');
	$("#cx").val(coorX).closest('div').addClass('focused');
	$("#cy").val(coorY).closest('div').addClass('focused');
	$("#txtTelefono").val(phone).closest('div').addClass('focused');
	$("#txtCelular").val(celular).closest('div').addClass('focused');
	$("#txtEmail").val(email).closest('div').addClass('focused');
	$("#txtFecha_Nacimiento").val(birthDate).closest('div').addClass('focused');
	$("#txtEstado").val(status).closest('div').addClass('focused');
	$("#numRow").val(value);
	//initMap();
	initMapEdit('mapa',coorX,coorY);
	uploadFile('frmEmpleado',id);

}

	function loadImagesMulti(mod, id){

		var dato = JSON.stringify(id);
		$.ajax({
			url: '../../inc/loadImages.php',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: {
				id : id,
				mod : mod
				},
			beforeSend: function(data){
			   // $("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
			},
			success: function(data){
				var row = new Array();
				var sw = 0;
				var cont = data.num;
				i = 0;
				$.each(data,function(index,contenido){
					j = 0;
					$.each(contenido,function(index,valor){
						if(i >= cont){
							sw = 1;
						}
						if(sw == 1){
							size = valor/1000;
							size = size.toFixed(2);
							html = '<tr class="template-download fade in">'+
							'<td><span class="preview">'+
							'<a href="../../modulo/'+mod+'/uploads/files/'+row[j]+'" title="'+row[j]+'" download="'+row[j]+'" data-gallery=""><img src="../../modulo/'+mod+'/uploads/files/thumbnail/'+row[j]+'"></a>'+
							'</span></td>'+
							'<td><p class="name">'+
							'<a href="../../modulo/'+mod+'/uploads/files/'+row[j]+'" title="'+row[j]+'" download="'+row[j]+'" data-gallery="">'+row[j]+'</a></p></td>'+
							'<td><span class="size">'+size+' KB</span></td>'+
							'<td>'+
							'<button class="btn btn-danger btn-sm delete" data-type="DELETE" data-url="../../modulo/'+mod+'/uploads/index.php?file='+row[j]+'">'+
							'<i class="fa fa-trash"></i>'+
							'<span> Borrar</span>'+
							'</button>'+
							' <input id="delete" name="delete" value="1" class="toggle" type="checkbox">'+
							'</td>'
							'</tr>';
							   j++;
							$("#upload tbody").append(html);
						}else{
							row[i] = valor;
						}
						i++;
					});
				});
			}
		});
	}

 	function ComboTipo_Documento() {

        $.get("./ajax/EmpleadoAjax.php?op=listTipo_DocumentoPersona", function(r) {
                $("#cboTipo_Documento").html(r);

        })
    }

    function ComboEmpleado(){
			$.post("./ajax/EmpleadoAjax.php?op=listEmpleado", function(r){
	            $("#cboEmpleado").html(r);
	        });
	}
