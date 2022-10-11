<!-- Principal -->
<main class="auth">
    <!-- Titulo y Descripcion -->
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <?php if($token_valido): ?>
        <?php if(!$reestablecida): ?>
            <p class="auth__texto">Coloca tu nueva contraseña para reestablecer tu cuenta de DevWebCamp</p>
        <?php endif; ?>
    <?php else: ?>
        <p class="auth__texto">Tu Token no es valido</p>
    <?php endif; ?>
    <!-- Alertas -->
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <!-- Formulario -->
    <?php if($token_valido && !$reestablecida): ?>
        <form class="formulario" method="POST">
            <!-- Password -->
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Nueva Contraseña</label>
                <input class="formulario__input" type="password" placeholder="Tu Nueva Contraseña" id="password" name="password">
            </div>
            <!-- Repetir Password -->
            <div class="formulario__campo">
                <label class="formulario__label" for="password2">Repetir Contraseña</label>
                <input class="formulario__input" type="password" placeholder="Repetir Contraseña" id="password2" name="password2">
            </div>
            <!-- Boton Enviar -->
            <input class="formulario__submit" type="submit" value="Guardar Contraseña">
        </form>
    <?php endif; ?>
    <?php if($reestablecida): ?>
        <a  href="/login" class="acciones__confirmado">Iniciar Sesion</a>
    <?php else: ?>
        <!-- Acciones -->
        <div class="acciones">
            <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta?, Inicia Sesion</a>
            <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta?, Crea una</a>
        </div>
    <?php endif; ?>  
</main>