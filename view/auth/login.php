<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php
    foreach ($errores as $error) {

        if ($error[0] !== "") {

            echo "<div class='alerta error'>";
            echo "$error";
            echo "</div>";
        }
    }
    ?>
    <form action="/login" method="POST">

        <fieldset>
            <legend>Login</legend>

            <label for="email">E-mail</label>
            <input name="auth[email]" type="email" id="email" placeholder="Tu email" require>

            <label for="password">Password</label>
            <input name="auth[password]" type="password" id="password" placeholder="Tu password" require>

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton-verde d">

    </form>
</main>