<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin" class="boton-verde">Volver</a>


    <?php
    foreach ($errores as $error) {

        if ($error[0] !== "") {

            echo "<div class='alerta error'>";
            echo "$error";
            echo "</div>";
        }
    }
    ?>

    <form action="" class=" seccion" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar propiedad" class="boton-verde x">
    </form>
</main>