//VARIABLES GENERALES
//DECLARAS FUERA DEL READY DE JQUERY
var map;
var markers = [];
var marcadores_bd=[];
var marcadores_bd_profile=[];
var mapa = null; //VARIABLE GENERAL PARA EL MAPA

//
//VISUALIZA MARCA
//

function initMapProfile(idMapa,coorX,coorY){

    /* GOOGLE MAPS */

    //COODENADAS INICIALES -16.5207007,-68.1615534
    //VARIABLE PARA EL PUNTO INICIAL
    var punto = new google.maps.LatLng(coorX, coorY);
    //VARIABLE PARA CONFIGURACION INICIAL
    var config = {
        zoom:15,
        center:punto,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    mapa = new google.maps.Map( $("#"+idMapa)[0], config );

    marksListProfile(coorX,coorY);
}

function marksListProfile(coorX,coorY){
    //ANTES DE LISTAR MARCADORES
    //SE DEBEN QUITAR LOS ANTERIORES DEL MAPA
    deleteMarkers(markers);
    var formulario_edicion = $("#frmEmpleado");

    //OBTENER LAS COORDENADAS DEL PUNTO
    var posi = new google.maps.LatLng(coorX, coorY);
    //CARGAR LAS PROPIEDADES AL MARCADOR
    var marca = new google.maps.Marker({
        //idMarcador:item.IdPunto,
        position:posi,
        //zoom:15,
        //titulo: item.Titulo,
        cx:coorX,//esas coordenadas vienen de la BD
        cy:coorY,//esas coordenadas vienen de la BD
        draggable: false
    });
    //AGREGAR EVENTO CLICK AL MARCADOR
    //MARCADORES QUE VIENEN DE LA BASE DE DATOS
    google.maps.event.addListener(marca, 'click', function(){
        alert("Hiciste click en "+marca.position + " - " + marca.titulo);
        //ENTRAR EN EL SEGUNDO COLAPSIBLE
        //Y OCULTAR EL PRIMERO
        //$("#collapseTwo").collapse("show");
        //$("#collapseOne").collapse("hide");
        //VER DOCUMENTACION DE BOOTSTRAP

        //AHORA PASAR LA INFORMACION DEL MARCADOR
        //AL FORMULARIO
        /*formulario_edicion.find("input[name='id']").val(marca.idMarcador);
        formulario_edicion.find("input[name='titulo']").val(marca.titulo).focus();
        formulario_edicion.find("input[name='cx']").val(marca.cx);
        formulario_edicion.find("input[name='cy']").val(marca.cy);*/

    });
    //AGREGAR EL MARCADOR A LA VARIABLE MARCADORES_BD
    marcadores_bd_profile.push(marca);
    //UBICAR EL MARCADOR EN EL MAPA
    marca.setMap(mapa);
}

//
//CARGAR MARCAS
//

function initMapEdit(idMapa,coorX,coorY){
        /* GOOGLE MAPS */
        var formulario = $('#frmEmpleado');
        //COODENADAS INICIALES -16.5207007,-68.1615534
        //VARIABLE PARA EL PUNTO INICIAL

        if (coorX == '' && coorY == '') {
            coorX = '-16.5207007';
            coorY = '-68.1615534';
        }

        var punto = new google.maps.LatLng(coorX, coorY);
        //VARIABLE PARA CONFIGURACION INICIAL
        var config = {
            zoom:15,
            center:punto,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        mapa = new google.maps.Map( $('#'+idMapa)[0], config );

        google.maps.event.addListener(mapa, "click", function(event){
            //OBTENER COORDENADAS POR SEPARADO
            var coordenadas = event.latLng.toString();
            coordenadas = coordenadas.replace("(", "");
            coordenadas = coordenadas.replace(")", "");

            var lista = coordenadas.split(",");
            //alert(lista[0]+"---"+lista[1])
            var direccion = new google.maps.LatLng(lista[0], lista[1]);
            //variable marcador
            var marcador = new google.maps.Marker({
                //titulo: prompt("Titulo del marcador"),
                position: direccion,
                map: mapa, //ENQUE MAPA SE UBICARA EL MARCADOR
                animation: google.maps.Animation.DROP, //COMO APARECERA EL MARCADOR
                draggable: false // NO PERMITIR EL ARRASTRE DEL MARCADOR
                //title:"Hello World!"
            });

            //PASAR LAS COORDENADAS AL FORMULARIO
            formulario.find("input[name='cx']").val(lista[0]);
            formulario.find("input[name='cy']").val(lista[1]);
            //UBICAR EL FOCO EN EL CAMPO TITULO
            formulario.find("input[name='addresC']").focus();

            //UBICAR EL MARCADOR EN EL MAPA
            //setMapOnAll(null);
            markers.push(marcador);

            //AGREGAR EVENTO CLICK AL MARCADOR
            google.maps.event.addListener(marcador, "click", function(){
                //alert(marcador.titulo);
            });
            deleteMarkers(markers);
            deleteMarkers(marcadores_bd);
            marcador.setMap(mapa);
        });
    marksList(coorX,coorY);
}

function deleteMarkersU(lista){
    for(i in lista){
        lista[i].setMap(null);
    }
}

function deleteMarkers(lista){
    for(i in lista){
        lista[i].setMap(null);
    }
}

function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {
        // Si hay resultados encontrados, centramos y repintamos el mapa
        // esto para eliminar cualquier pin antes puesto
        var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        //mapa = new google.maps.Map($("#mapa").get(0), mapOptions);
        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        mapa.fitBounds(results[0].geometry.viewport);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
        //var markerOptions = { position: results[0].geometry.location }
        var direccion = results[0].geometry.location;
        var coordenadas = direccion.toString();

        coordenadas = coordenadas.replace("(", "");
        coordenadas = coordenadas.replace(")", "");
        var lista = coordenadas.split(",");

        //var direccion = new google.maps.LatLng(lista[0], lista[1]);
        //PASAR LAS COORDENADAS AL FORMULARIO

        $('#frmEmpleado').find("input[name='cx']").val(lista[0]);
        $('#frmEmpleado').find("input[name='cx']").val(lista[1]);
        //$('#form').find("input[name='buscar']").val('');

        var marcador = new google.maps.Marker({
            position: direccion,
            zoom:15,
            map: mapa, //EN QUE MAPA SE UBICARA EL MARCADOR
            animation: google.maps.Animation.DROP, //COMO APARECERA EL MARCADOR
            draggable: false // NO PERMITIR EL ARRASTRE DEL MARCADOR
        });
        markers.push(marcador);
        deleteMarkersU(markers);
        //marcador.setMap(mapa);
        //marker.setMap(mapa);

    } else {
        // En caso de no haber resultados o que haya ocurrido un error
        // lanzamos un mensaje con el error
        alert("El buscador no tuvo éxito debido a: " + status);
    }
}

function marksList(coorX,coorY){
    //ANTES DE LISTAR MARCADORES
    //SE DEBEN QUITAR LOS ANTERIORES DEL MAPA
    deleteMarkers(markers);
    var formulario_edicion = $("#frmEmpleado");

    //OBTENER LAS COORDENADAS DEL PUNTO
    var posi = new google.maps.LatLng(coorX, coorY);
    //CARGAR LAS PROPIEDADES AL MARCADOR
    var marca = new google.maps.Marker({
        //idMarcador:item.IdPunto,
        position:posi,
        //zoom:15,
        //titulo: item.Titulo,
        cx:coorX,//esas coordenadas vienen de la BD
        cy:coorY,//esas coordenadas vienen de la BD
        draggable: false
    });
    //AGREGAR EVENTO CLICK AL MARCADOR
    //MARCADORES QUE VIENEN DE LA BASE DE DATOS
    google.maps.event.addListener(marca, 'click', function(){
        alert("Hiciste click en "+marca.position + " - " + marca.titulo);
        //ENTRAR EN EL SEGUNDO COLAPSIBLE
        //Y OCULTAR EL PRIMERO
        //$("#collapseTwo").collapse("show");
        //$("#collapseOne").collapse("hide");
        //VER DOCUMENTACION DE BOOTSTRAP

        //AHORA PASAR LA INFORMACION DEL MARCADOR
        //AL FORMULARIO
        /*formulario_edicion.find("input[name='id']").val(marca.idMarcador);
        formulario_edicion.find("input[name='titulo']").val(marca.titulo).focus();
        formulario_edicion.find("input[name='cx']").val(marca.cx);
        formulario_edicion.find("input[name='cy']").val(marca.cy);*/

    });
    //AGREGAR EL MARCADOR A LA VARIABLE MARCADORES_BD
    marcadores_bd.push(marca);
    //UBICAR EL MARCADOR EN EL MAPA
    marca.setMap(mapa);
}

 // BUSCADOR
$('#search').on('click', function() {
    // Obtenemos la dirección y la asignamos a una variable
    var address = $('#buscar').val();
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
});
