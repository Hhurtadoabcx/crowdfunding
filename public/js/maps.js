var mapa;
var marcador; // Variable para almacenar el marcador único
var marcadorPosicion; // Variable para almacenar la posición del marcador

function agregarMarcador(mapa, posicion) {
    // Eliminar cualquier marcador existente
    if (marcador) {
        marcador.setMap(null);
    }

    // Crear un nuevo marcador en la posición proporcionada
    marcador = new google.maps.Marker({
        position: posicion,
        map: mapa
    });

    // Actualizar los campos de latitud y longitud en el formulario
    marcadorPosicion = posicion;
    if (marcadorPosicion) {
        var latitud = marcadorPosicion.lat();
        var longitud = marcadorPosicion.lng();
        console.log('Latitud:', latitud);
        console.log('Longitud:', longitud);
        document.getElementById('latitud').value = latitud;
        document.getElementById('longitud').value = longitud;

        // Actualizar el campo de coordenadas
        document.getElementById('coordenadas').value = latitud + ',' + longitud;
    }
}

function initMap() {
    mapa = new google.maps.Map(document.getElementById('MapDiv'), {
        zoomControl: false,
        minZoom: 15,
        maxZoom: 25,
        zoom:15,
        center: {lat: -17.787196890846058, lng: -63.18408002300712}
    });

    // Agregar un listener de clic al mapa
    google.maps.event.addListener(mapa, 'click', function(event) {
        var posicion = event.latLng;
        agregarMarcador(mapa, posicion);
    });
}

function submitForm() {
    // Update hidden input field with latitude and longitude
    if (marcadorPosicion) {
        var latitud = marcadorPosicion.lat();
        var longitud = marcadorPosicion.lng();
        console.log('Latitud:', latitud);
        console.log('Longitud:', longitud);
        document.getElementById('latitud').value = latitud;
        document.getElementById('longitud').value = longitud;

        // Update the coordinates field
        document.getElementById('coordenadas').value = latitud + ',' + longitud;
    }

    // Continue with form submission
    return true;
}
