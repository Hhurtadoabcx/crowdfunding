
function calcularTotal() {
    var total = 0;
    var arbolesSeleccionados = [];
    arboles.forEach(function (arbol, index) {
        var cantidad = parseInt(document.getElementById('arbol' + index).value);

        if (cantidad > 0) {
            total += cantidad * arbol.precio;
            arbolesSeleccionados.push(arbol.tipo + ' x' + cantidad);
        }
    });
    document.getElementById('arbolesSeleccionados').innerHTML = arbolesSeleccionados.join('<br>');
    document.getElementById('totalDonacion').innerHTML = 'Total de la donación: ' + total+'$';
}
document.addEventListener('DOMContentLoaded', function() {
    calcularTotal();
});
