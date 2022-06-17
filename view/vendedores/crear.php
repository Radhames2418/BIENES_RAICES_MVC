<main class="contenedor seccion">
    <h1>Registrar vendedor</h1>
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

    <form  class="seccion" method="POST" action="/vendedores/crear">
        <?php include __DIR__ .'/formulario.php'; ?>
        <input type="submit" value="Registrar Vendedor" class="boton-verde x">
    </form>
</main>