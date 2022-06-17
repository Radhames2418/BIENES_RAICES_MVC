<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad) :?>
        <div class="anuncio">
                    <picture>
                        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen;  ?>" alt="imagen de anuncio">
                    </picture>
                    <div class="contenido-anuncio">
                        <h3><?php echo $propiedad->titulo  ?></h3>
                        <p><?php echo $propiedad->descripcion ?></p>
                        <p class="precio">$<?php echo $propiedad->precio ?></p>
                        
                        <ul class="iconos-caracteristica">
                            <li>
                                <img loading="lazy" src="/build/img/icono_wc.svg" alt="icono">
                                <p><?php echo $propiedad->habitaciones  ?></p>
                            </li>
    
                            <li>
                                <img loading="lazy" src="/build/img/icono_estacionamiento.svg" alt="icono">
                                <p><?php echo $propiedad->wc  ?></p>
                            </li>
                            <li>
                                <img loading="lazy" src="/build/img/icono_dormitorio.svg" alt="icono">
                                <p><?php echo $propiedad->estacionamiento  ?></p>
                            </li>
                            
                        </ul>

                        <a href="/propiedad?id=<?php echo $propiedad->id  ?>" class="boton  boton-amarillo">
                            Ver Propiedadades
                        </a>
                    </div>
                </div>


    <?php endforeach; ?>    
</div>
