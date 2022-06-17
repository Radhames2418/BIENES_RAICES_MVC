<main class="contenedor">
    <h2 data-cy='heading-iconos'>Mas Sobre Nosotros</h2>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="/build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci sequi, quisquam quidem reprehenderit cum quos fugit ratione at magni labore! Rerum!</p>
        </div>

        <div class="icono">
            <img src="/build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci sequi, quisquam quidem reprehenderit cum quos fugit ratione at magni labore! Rerum!</p>
        </div>

        <div class="icono">
            <img src="/build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci sequi, quisquam quidem reprehenderit cum quos fugit ratione at magni labore! Rerum!</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en Ventas</h2>


    <?php
    $limite = true;
    include __DIR__ . '/anuncio.php';
    ?>

    <div class="ver-todas">
        <a href="/anuncios" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto seccion">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a class="boton-amarillo-inlineblog" href="/contacto">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="/build/img/blog1.webp" type="image/webp">
                    <source srcset="/build/img/blog1.jpg" type="image/jpeg">
                    <img src="/build/img/blog1.jpg" alt="texto de entrada blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Consejos para construir en el techo de tu casa con los mejores materiales y ahorrando dinero.
                    </p>
                </a>

            </div>
        </article>


        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="/build/img/blog2.webp" type="image/webp">
                    <source srcset="/build/img/blog2.jpg" type="image/jpeg">
                    <img src="/build/img/blog2.jpg" alt="texto de entrada blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guía para la decoración de tu hogar
                    </h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                    </p>
                </a>

            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>
                - Marino Encarnacion
            </p>
        </div>
    </section>
</div>