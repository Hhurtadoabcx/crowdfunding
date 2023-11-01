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

    marcadorPosicion = posicion;
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
    // ... (tu código para manejar el envío del formulario)

    // Imprimir las coordenadas del marcador en la consola
    if (marcadorPosicion) {
        console.log("Coordenadas del marcador:", marcadorPosicion.lat(), marcadorPosicion.lng());
    }
}
