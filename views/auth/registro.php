<!-- Principal -->
<main class="auth">
    <!-- Titulo y Descripcion -->
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Registrate en DevWebCamp</p>

    <!-- Formulario -->
    <form class="formulario">
        <!-- Nombre -->
        <div class="formulario__campo">
            <label class="formulario__label" for="nombre">Nombre</label>
            <input class="formulario__input" type="text" placeholder="Tu Nombre" id="nombre" name="nombre">
        </div>
        <!-- Apellido -->
        <div class="formulario__campo">
            <label class="formulario__label" for="apellido">Apellido</label>
            <input class="formulario__input" type="text" placeholder="Tu Apellido" id="apellido" name="apellido">
        </div>
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
        <!-- Repetir Password -->
        <div class="formulario__campo">
            <label class="formulario__label" for="password2">Repetir Contraseña</label>
            <input class="formulario__input" type="password" placeholder="Repetir Contraseña" id="password2" name="password2">
        </div>
        <!-- Boton Enviar -->
        <input class="formulario__submit" type="submit" value="Crear Cuenta">
    </form>
    <!-- Acciones -->
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta?, Inicia Sesion</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu password?</a>
    </div>
</main>