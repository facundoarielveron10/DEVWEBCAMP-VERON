<!-- Principal -->
<main class="auth">
    <!-- Titulo y Descripcion -->
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Recupera tu acceso en DevWebCamp</p>

    <!-- Formulario -->
    <form class="formulario">
        <!-- Email -->
        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input class="formulario__input" type="email" placeholder="Tu Email" id="email" name="email">
        </div>
        <!-- Boton Enviar -->
        <input class="formulario__submit" type="submit" value="Enviar Instrucciones">
    </form>
    <!-- Acciones -->
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta?, Inicia Sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta?, Crea una</a>
    </div>
</main>