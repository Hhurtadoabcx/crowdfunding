<?php

function contribuidor($rol, $nombre, $email, $ruta_imagen) {

    // Eliminar la variable $clase_adicional
    $clase_columna = "col-lg-4 col-md-6 col-sm-12";

    echo '<div class="' . $clase_columna . ' mb-4">';
    echo '<div class="card">';
    echo '<img src="' . $ruta_imagen . '" alt="Foto del contribuidor" class="card-img-top">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $nombre . '</h5>';
    echo '<p class="card-text">' . $rol . '</p>';
    echo '<p class="card-text">' . $email . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

}

?>

<div class="row justify-content-center col-md-12">
    <?php
    contribuidor("Product Owner", "Juan Pérez", "juan@email.com", "https://generated.photos/vue-static/face-generator/landing/wall/1.jpg");
    contribuidor("SCRUM Master", "María Rodríguez", "maria@email.com", "https://generated.photos/vue-static/face-generator/landing/wall/2.jpg");
    ?>
</div>

<div class="row">
    <?php
    contribuidor("Desarrollador", "Juan Gómez", "juang@email.com", "https://generated.photos/vue-static/face-generator/landing/wall/3.jpg");
    contribuidor("Desarrollador", "Pedro López", "pedro@email.com", "https://generated.photos/vue-static/face-generator/landing/wall/4.jpg");
    contribuidor("Desarrollador", "Laura Torres", "laura@email.com", "https://generated.photos/vue-static/face-generator/landing/wall/5.jpg");
    ?>
</div>

