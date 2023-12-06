var mapa;
var marcador;
var marcadorPosicion;

function agregarMarcador(mapa, posicion) {
    // Eliminar cualquier marcador existente
    if (marcador) {
        marcador.setMap(null);
    }
    marcador = new google.maps.Marker({
        position: posicion,
        map: mapa
    });
    marcadorPosicion = posicion;
    if (marcadorPosicion) {
        var latitud = marcadorPosicion.lat();
        var longitud = marcadorPosicion.lng();
        console.log('Latitud:', latitud);
        console.log('Longitud:', longitud);
        document.getElementById('latitud').value = latitud;
        document.getElementById('longitud').value = longitud;
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
    if (!marcadorPosicion) {
        alert('Por favor, seleccione una ubicación en el mapa.');
        return false;
    }
    if (marcadorPosicion) {
        var latitud = marcadorPosicion.lat();
        var longitud = marcadorPosicion.lng();
        console.log('Latitud:', latitud);
        console.log('Longitud:', longitud);
        document.getElementById('latitud').value = latitud;
        document.getElementById('longitud').value = longitud;
        document.getElementById('coordenadas').value = latitud + ',' + longitud;
    }
    return true;
}
