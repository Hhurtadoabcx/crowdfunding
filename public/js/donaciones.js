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

    // Actualiza el contenido del div con la clase "recibo"
    var reciboDiv = document.getElementById('recibo');
    reciboDiv.innerHTML = '<h2>Total de la donación: </h2><div>' + detallesDonacion + '</div>';

    // Agrega el botón de confirmación
    var confirmarBoton = document.createElement("button");
    confirmarBoton.innerHTML = "Confirmar Donación";
    confirmarBoton.onclick = function() {
        confirmarDonacion();
        reciboDiv.innerHTML += '<p>Donación confirmada</p>';  // Puedes personalizar este mensaje
    };

    reciboDiv.appendChild(confirmarBoton);
}



function confirmarDonacion() {
    // Aquí puedes realizar una llamada AJAX al servidor para confirmar la donación
    // Puedes usar la función fetch o cualquier otra forma que prefieras
    // Ejemplo de llamada AJAX utilizando fetch:
    fetch('/confirmar-donacion', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ idProyecto: "{{ $id }}" })
    })
        .then(response => response.json())
        .then(data => {
            // Maneja la respuesta del servidor si es necesario
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


// Añade la siguiente línea para ejecutar calcularTotal al cargar el documento
document.addEventListener('DOMContentLoaded', function() {
    calcularTotal();
});
