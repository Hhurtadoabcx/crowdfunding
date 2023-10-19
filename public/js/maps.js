var mapa;
var marcador; // Variable para almacenar el marcador único

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
}

function initMap() {
    mapa = new google.maps.Map(document.getElementById('MapDiv'), {
        zoom: 8,
        center: {lat: -17.7833, lng: -63.1821},
        gestureHandling: "greedy",
        zoomControl: false,
        minZoom: 15,
        maxZoom: 20,
        styles: [
            {
                featureType: 'poi',
                stylers: [{visibility: 'off'}]
            }
        ]
    });

    // Agregar un listener de clic al mapa
    google.maps.event.addListener(mapa, 'click', function(event) {
        var posicion = event.latLng;
        agregarMarcador(mapa, posicion);
    });
}
