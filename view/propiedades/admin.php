<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (isset($mensaje)) {

        if ($mensaje === "1") {
            echo "<div class='alerta correcto'>";
            echo "Enviado correctemente";
            echo "</div>";
        }

        if ($mensaje === "2") {
            echo "<div class='alerta correcto'>";
            echo "Actualizado correctemente";
            echo "</div>";
        }

        if ($mensaje === "3") {
            echo "<div class='alerta error'>";
            echo "No se pudo actualizar correctamente";
            echo "</div>";
        }

        if ($mensaje === "4") {
            echo "<div class='alerta correcto'>";
            echo "Eliminado correctemente";
            echo "</div>";
        }

        if ($mensaje === "5") {
            echo "<div class='alerta error'>";
            echo "No se pudo eliminar correctamente";
            echo "</div>";
        }

        if ($mensaje === "5") {
            echo "<div class='alerta error'>";
            echo "No se pudo eliminar correctamente";
            echo "</div>";
        }
    } ?>

    <a href="/propiedades/crear" class="boton-verde">Nueva propiedad</a>
    <a style="background-color: #e08709;" href="/vendedores/crear" class="boton-verde">Nuevo vendedor</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>

        <tbody class="cuerpo-tabla">
            <?php foreach ($propiedades as $propiedad) : ?>

                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="imagen"></td>
                    <td class="precio"><?php echo "$" . $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block w-100" value="Eliminar">
                        </form>

                        <a href="./propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
        </thead>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Acciones</th>

            </tr>

        <tbody class="cuerpo-tabla">
            <?php foreach ($vendedores as $vendedor) : ?>

                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre; ?></td>
                    <td><?php echo $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block w-100" value="Eliminar">
                        </form>

                        <a href="./vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
        </thead>
    </table>

</main>