<!-- Principal -->
<main class="auth">
    <!-- Titulo y Descripcion -->
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <?php if($confirmado): ?>
        <p class="auth__texto">Tu Cuenta de DevWebCamp ha sido confirmada</p>
    <?php else: ?>
        <p class="auth__texto">El Token no es valido</p>
    <?php endif; ?> 
    <!-- Alertas -->
    <?php require_once __DIR__ . "/../templates/alertas.php" ?>
    <?php if($confirmado): ?>
        <a  href="/login" class="acciones__confirmado">Iniciar Sesion</a>
    <?php endif; ?>
</main>