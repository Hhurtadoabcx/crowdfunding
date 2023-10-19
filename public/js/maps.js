// Marcadores
var marcadores = {
    "Marcador 1": {lat: -17.7833, lng: -63.1821},
};
function agregarMarcadores(mapa, marcadores) {
    for (var nombre in marcadores) {
        var marcador = new google.maps.Marker({
            position: marcadores[nombre],
            map: mapa,
            title: nombre
        });
    }
}
// Mapa
var mapa;
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
    agregarMarcadores(mapa, marcadores);
}
