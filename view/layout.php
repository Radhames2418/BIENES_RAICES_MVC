<?php


if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" type="text/css" href="../build/css/app.css??v=<?php echo (rand()); ?>" media="all">

</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">

                <a href="/">
                    <img src="/build/img/logo.svg" alt="logotipo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono de menu responsive">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="boton de dark mode" class="dark-mode-boton">

                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/anuncios">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/admin">Admin</a>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php elseif (!$auth) : ?>
                            <a href="/login">Iniciar Sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>


            </div>
            <!--Este es el cierre de la barra-->
            <h1 data-cy='heading-sitio'>Venta de Casas y Departamentos <span>Exclusivos de Lujo</span></h1>
        </div>
    </header>

    <?php echo $contenido
    ?>

    <footer class="footer ">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/anuncios">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>


        <p class="copyright">Todos los derechos reservador
            <?php $fecha  = date('Y');
            echo $fecha; ?> ,
            <span class="autor">Radhames Encarnacion</span>
        </p>
    </footer>


    <script src="/build/js/bundle.min.js?v=<?php echo (rand()); ?>"></script>
</body>

</html>