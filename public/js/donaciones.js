// donaciones.js

function calcularTotal() {
    var total = 0;
    arboles.forEach(function(arbol, index) {
        var cantidad = document.getElementById('arbol' + index).value;
        total += cantidad * arbol.precio;
    });
    document.getElementById('totalDonacion').innerText = 'Total: ' + total;
}

function mostrarVentanaEmergente() {
    var detallesDonacion = "Detalle de la donación:\n\n";

    arboles.forEach(function(arbol, index) {
        var cantidad = document.getElementById('arbol' + index).value;
        if (cantidad > 0) {
            detallesDonacion += arbol.tipo + ": " + cantidad + " árbol(es)\n";
        }
    });

    detallesDonacion += "\nTotal a pagar: " + document.getElementById('totalDonacion').innerText;

    var ventanaEmergente = window.open('', '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes,center=yes');
    ventanaEmergente.document.write('<html><head><title>Detalle de la Donación</title></head><body>');
    ventanaEmergente.document.write('<pre>' + detallesDonacion + '</pre>');
    ventanaEmergente.document.write('</body></html>');
    ventanaEmergente.document.close();
}

// Añade la siguiente línea para ejecutar calcularTotal al cargar el documento
document.addEventListener('DOMContentLoaded', function() {
    calcularTotal();
});
