<!-- Principal -->
<main class="auth">
    <!-- Titulo y Descripcion -->
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Inicia sesion en DevWebCamp</p>
    <!-- Alertas -->
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <!-- Formulario -->
    <form class="formulario" method="POST" action="/login">
        <!-- Email -->
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input class="formulario__input" type="email" placeholder="Tu Email" id="email" name="email">
        </div>
        <!-- Password -->
        <div class="formulario__campo">
            <label class="formulario__label" for="password">Contraseña</label>
            <input class="formulario__input" type="password" placeholder="Tu Contraseña" id="password" name="password">
        </div>
        <!-- Boton Enviar -->
        <input class="formulario__submit" type="submit" value="Iniciar Sesion">
    </form>
    <!-- Acciones -->
    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta?, Crea una</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu password?</a>
    </div>
</main>