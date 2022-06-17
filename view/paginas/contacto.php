<main class="contenedor seccion contenido-centrado">
    <h1>Contacto</h1>

    <picture>
        <source srcset="/build/img/destacada3.webp" type="image/webp">
        <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
        <img src="/build/img/destacada3.jpg" alt="texto de destacada" loading="lazy">
    </picture>

    <h2>Llene el formulario de Conctacto</h2>

    <?php if ($mensaje)
    {

        if ($mensaje === "Enviado Correctamente") {
            echo "<div class='alerta correcto'>";
            echo "Enviado correctemente";
            echo "</div>";
        }

        if ($mensaje === "No fue enviado correctamente") {
            echo "<div class='alerta error'>";
            echo "No fue enviado correctamente";
            echo "</div>";
        }
    } ?>

    <form method="POST" action="/contacto" class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Tu nombre" name="contacto[nombre]" require>

            <label for="mensaje">Mensaje:</label>
            <textarea name="contacto[mensaje]" id="mensaje" require></textarea>


        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[tipo]" require>
                <option value="" disabled selected>--seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Presupuesto o precio</label>
            <input name="contacto[precio]" type="number" id="presupuesto" placeholder="Tu presupuesto" require>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como quisiera ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" require>

                <label for="contactar-email">Email</label>
                <input name="contacto[contacto]" type="radio" value="email" id="contactar-email" require>
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="ENVIAR" class="boton-verde d">


    </form>

</main>