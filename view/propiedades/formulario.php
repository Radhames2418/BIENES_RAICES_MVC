<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input name="propiedad[titulo]" type="text" id="titulo" placeholder="Titulo de la propiedad" value="<?php echo s($propiedad->titulo) ?>">

    <label for="precio">Precio:</label>
    <input name="propiedad[precio]" type="number" id="precio" placeholder="Precio de la sociedad" value="<?php echo s($propiedad->precio) ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

    <?php if ($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="imagen de la propiedad" class="imagen-small">
    <?php endif ?>

    <label for="descripcion">Descripcion:</label>
    <textarea name="propiedad[descripcion]" id="descripcion" placeholder=""><?php echo s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input name="propiedad[habitaciones]" type="number" id="habitaciones" placeholder="Habitaciones de la propiedad" min="1" max="9" value="<?php echo s($propiedad->habitaciones) ?>">

    <label for="wc">Baños:</label>
    <input name="propiedad[wc]" type="number" id="wc" placeholder="Baños de la propiedad" min="1" max="9" value="<?php echo s($propiedad->wc) ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input name="propiedad[estacionamiento]" type="number" id="estacionamiento" placeholder="Estacionamiento de la propiedad" min="1" max="9" value="<?php echo s($propiedad->estacionamiento) ?>">
</fieldset>


<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option value="" selected disabled>SELECCIONA UN VENDEDOR</option>
        <?php foreach($vendedores as $vendedor): ?>
            <option value=<?php echo s($vendedor->id) ?>><?php echo s($vendedor->nombre . " " . $vendedor->apellido ); ?></option>
        <?php endforeach ?>    
    </select>

</fieldset>