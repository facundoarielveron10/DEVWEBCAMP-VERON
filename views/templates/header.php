<!-- Header -->
<header class="header">
    <div class="header__contenedor">
        <!-- Navegacion -->
        <nav class="header__navegacion">
            <?php if(isAuth()): ?>
                <!-- Administrador -->
                <a class="header__enlace" href="<?php echo isAdmin() ? '/admin/dashboard' : '/finalizar-registro'; ?>">Administrar</a>
                <!-- Cerrar Sesion -->
                <form class="header__form" method="POST" action="/logout">
                    <input class="header__submit" type="submit" value="Cerrar Sesion">
                </form>
            <?php else: ?>
                <a class="header__enlace" href="/registro">Registrarse</a>
                <a class="header__enlace" href="/login">Iniciar Sesion</a>
            <?php endif; ?>
        </nav>
        <!-- Contenido -->
        <div class="header__contenido">
            <!-- Logo -->
            <a href="/">
                <h1 class="header__logo">&#60;DevWebCamp /></h1>
            </a>
            <!-- Datos -->
            <p class="header__texto">Febrero 15-16 - 2023</p>
            <p class="header__texto header__texto--modalidad">En linea - Presencial</p>
            <!-- Boton Compra -->
            <a href="/registro" class="header__boton">Comprar Pase</a>
        </div>
    </div>
</header>
<!-- Barra -->
<div class="barra">
    <!-- Contenido -->
    <div class="barra__contenido">
        <!-- Logo -->
        <a href="/">
            <h2 class="barra__logo">
                &#60;DevWebCamp />
            </h2>
        </a>
        <!-- Navegacion -->
        <nav class="navegacion">
            <a href="/devwebcamp" class="navegacion__enlace <?php echo paginaActual('/devwebcamp') ? 'navegacion__enlace--actual' : ''; ?>">Evento</a>
            <a href="/paquetes" class="navegacion__enlace <?php echo paginaActual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Paquetes</a>
            <a href="/workshops-conferencias" class="navegacion__enlace <?php echo paginaActual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Conferencias / Workshops</a>
            <?php if(isAuth() || isAdmin()): ?>
                <a href="/finalizar-registro" class="navegacion__enlace <?php echo paginaActual('/finalizar-registro') ? 'navegacion__enlace--actual' : ''; ?>">Comprar Pase</a>
            <?php else: ?>
                <a href="/registro" class="navegacion__enlace <?php echo paginaActual('/registro') ? 'navegacion__enlace--actual' : '' ?>">Comprar Pase</a>
            <?php endif; ?>
        </nav>
    </div>
</div>