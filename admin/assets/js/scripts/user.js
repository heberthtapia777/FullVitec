var validator
$( document ).ready(function() {
    init();
    $('ul#contac').addClass('show');
    $('ul li a#user').addClass('active');

    validator = $("#frmUser").submit(function() {
        // update underlying textarea before submit validation
    }).validate({
        ignore: "",
        rules: {
            txtEmpresa: "required",
            cboTypeUser: "required",
            txtEmail: {
                required: true,
                email: true
            },
            txtUser: {
				required: true,
				remote: "validateUser.php"
			},
            txtPassword: {
                required: true,
                minlength: 5
            },
            txtPasswordRep: {
                required: true,
                minlength: 5,
                equalTo: "#txtPassword"
            },
        },
        messages: {
            txtEmail: "Por favor, introduce una dirección de correo válida",
            txtPassword: {
                required: "Por favor ingrese una contraseña",
                minlength: "Tu contraseña debe tener al menos 5 caracteres"
            },
            txtPasswordRep: {
                required: "Por favor ingrese una contraseña",
                minlength: "Tu contraseña debe tener al menos 5 caracteres",
                equalTo: "La contraseña no es igual"
            },
            txtUser: {
				required: 'Este campo es requerido.',
				remote: 'Usuario ya registrado'
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

    });
});


function init(){
    ocultarForm();
    listadoUsuarios();

    $("#btnNuevo").click(verForm);
    $("#btnBuscarEmploye").click(abrirModalEmploye);

    $("#btnAgregarEmploye").click(function(e){
		e.preventDefault();

        var opt = $("input[type=radio]#optEmploye:checked");
		$("#txtIdEmploye").val(opt.val());
		$("#txtEmploye").val(opt.attr("data-Employe"));

		$("#modalListaEmploye").modal("hide");
    });
}

function Limpiar(){
	$("#frmUser")[0].reset();
	validator.resetForm();
	$("#frmUser").find('input').removeClass('is-valid');
	$("#frmUser").find('select').removeClass('is-valid');
	$("table#upload tbody").html('');
}

function verForm(){
    $("#verForm").show("slow", function () {
		$(this).find('h5').html('Nuevo Usuario');
		$('#btnCancel').css('display','block');
		$('#btnNuevo').css('display', 'none');
	});// Mostramos el formulario
	//$("#btnNuevo").hide();
	$("#verLista").hide();// ocultamos el listado
	Limpiar();
}

function ocultarForm(){
    $("#verForm").hide();// Mostramos el formulario
    //$("#btnNuevo").show();// ocultamos el boton nuevo
    $('#btnCancel').css('display', 'none');
	$('#btnNuevo').css('display', 'block');
    $("#verLista").show();
}

function cancelar() {
	Limpiar();
	ocultarForm();
}

function abrirModalEmploye(){
    $("#modalListaEmploye").modal("show");

    var table = $('#tblTrabajadores').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "scrollX": true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
        },
        "aoColumns":[
                {   "mDataProp": "0"},
                {   "mDataProp": "1"},
                {   "mDataProp": "2"},
                {   "mDataProp": "3"},
                {   "mDataProp": "4"},
                {   "mDataProp": "5"},
                {   "mDataProp": "6"}
        ],
        "ajax":
            {
                url: '../../ajax/usersAjax.php?op=listEmploye',
                type : "get",
                dataType : "json",

                error: function(e){
                    console.log(e.responseText);
                }
            },
        "bDestroy": true
    }).DataTable();
}

$.validator.setDefaults( {
    submitHandler: function () {
        //alert( "submitted!" );
        //$("#frmBoletin").submit();
        //var formData = new FormData($("#frmUsuarios")[0]);
        var dato = JSON.stringify( $('#frmUser').serializeObject() );

        $.ajax({
            url: "../../ajax/usersAjax.php?op=saveOrUpdate",
            type: "POST",
            dataType: 'JSON',
            asinc: true,
            data: {res:dato},
            success: function(data){
                if(data.txtIdUser == ''){
                    if(data != 0){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'USUARIO registrado exitosamente.',
                            showConfirmButton: false,
                            timer: 2000
                        }).then((result) => {
                            listadoUsuarios();
                            ocultarForm();
                        })

                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error al registrar USUARIO.',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }else{
                    if(data != 0){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'USUARIO actualizado correctamente.',
                            showConfirmButton: false,
                            timer: 2000
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            listadoUsuarios();
                            ocultarForm();
                        })
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Error al actulizar USUARIO.',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            }

        });
    }
} );


function listadoUsuarios(){
    var table = $('#tblUsuarios').dataTable(
    {   "aProcessing": true,
        "aServerSide": true,
        "scrollX": true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
        },
        "aoColumns":[
            {   "mDataProp": "0"},
            {   "mDataProp": "1"},
            {   "mDataProp": "2"},
            {
                "mDataProp": "3",
                className: 'dt-body-center'
            },
            {   "mDataProp": "4"},
            {   "mDataProp": "5"},
            {   "mDataProp": "6"},
            {   "mDataProp": "7"},
            {   "mDataProp": "8"}
        ],
        "ajax":{
            url: '../../ajax/usersAjax.php?op=list',
            type : "get",
            dataType : "json",

            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true
    }).DataTable();
};

function cargarDataUsuario(idUser,idSucursal,employe,idEmploye,userType,email,login){
    verForm();
    //$("#btnNuevo").hide();
    //$("#VerListado").hide();

    $("#txtIdUser").val(idUser);
    $("#cboSucursal").val(idSucursal);
    $("#txtIdEmploye").val(idEmploye);
    $("#txtEmploye").val(employe).closest('div').addClass('focused');
    $("#cboTypeUser").val(userType).closest('div').addClass('focused');
    $("#txtUser").val(login).closest('div').addClass('focused');

}

function deleteUser(id){

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
			$.post("../../ajax/usersAjax.php?op=delete", {id : id}, function(e){// llamamos la url de eliminar por post. y mandamos por parametro el id
                Swal.fire({
					position: 'top-end',
					title: 'Borrado!',
					text: 'El Usuario ha sido eliminado.',
					icon: 'success',
					showConfirmButton: false,
					timer: 3000
				});
				listadoUsuarios();
            });
		}
	})
}

/**
 * Cambia status del Tax Alert
 * @param {*} id
 * @param {*} val
 */

function status(id, val){
    $.ajax({
        url: "../../ajax/usersAjax.php?op=status",
        type: "POST",
        data:{
            id: id,
            val: val
        },
        success: function(data)
        {
            if(val == 1){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario INACTIVO',
                    showConfirmButton: false,
                    timer: 1500
                })
				$('a#'+id).parent('td').html('<a href="#" id="'+id+'" onclick="status('+id+', 0)"><span class="badge bg-danger"><i class="fas fa-times-circle"></i></span></a>')
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario ACTIVO',
                    showConfirmButton: false,
                    timer: 1500
                })
				$('a#'+id).parent('td').html('<a href="#" id="'+id+'" onclick="status('+id+', 1)"><span class="badge bg-success"><i class="fas fa-check-circle"></i></span></a>')
            }
            //listaCom();
            /*  OcultarForm();
            Limpiar();*/
        }

    });
}
// function comboTypeUser(){
//     $.post("../../ajax/usersAjax.php?op=listTypeUser", function(r){
//         $("#cboTypeUser").html(r);
//     });
// }