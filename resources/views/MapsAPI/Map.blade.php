<!DOCTYPE html>
<html>
<head>
    <title>Mapa de Google</title>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    <link rel="stylesheet" href="/css/map-selection.css">
</head>
<body>
@include('layout.navbarProy')
<h1>Seleccione la Zona</h1>
<div id="MapDiv"></div>

<script>
    // Marcadores
    var marcadores = {
        "Marcador 1": {lat: -17.7833, lng: -63.1821},
        "Marcador 2": {lat: -17.789, lng: -63.175}
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
            minZoom: 12,
            maxZoom: 15,
            styles: [
                {
                    featureType: 'poi',
                    stylers: [{visibility: 'off'}]
                }
            ]
        });
        agregarMarcadores(mapa, marcadores);
    }

</script>
</body>
</html>
