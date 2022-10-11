<!-- Side Bar -->
<aside class="dashboard__sidebar">
    <!-- Menu -->
    <nav class="dashboard__menu">
        <!-- Inicio -->
        <a class="dashboard__enlace <?php echo paginaActual('/dashboard') ? "dashboard__enlace--actual" : ""; ?>" href="/admin/dashboard">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>
        <!-- Ponentes -->
        <a class="dashboard__enlace <?php echo paginaActual('/ponentes') ? "dashboard__enlace--actual" : "";?>" href="/admin/ponentes">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Ponentes
            </span>
        </a>
        <!-- Eventos -->
        <a class="dashboard__enlace <?php echo paginaActual('/eventos') ? "dashboard__enlace--actual" : "";?>" href="/admin/eventos">
            <i class="fa-solid fa-calendar-days dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Eventos
            </span>
        </a>
        <!-- Usuarios -->
        <a class="dashboard__enlace <?php echo paginaActual('/registrados') ? "dashboard__enlace--actual" : "";?>" href="/admin/registrados">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Registrados
            </span>
        </a>
        <!-- Regalos -->
        <a class="dashboard__enlace <?php echo paginaActual('/regalos') ? "dashboard__enlace--actual" : "";?>" href="/admin/regalos">
            <i class="fa-solid fa-gift dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Regalos
            </span>
        </a>
    </nav>
</aside>
<!-- Menu de hamburguesa -->
<div class="dashboard__hamburguesa">
    <img class="dashboard__hamburguesa--icono" src="/build/img/menu.svg" alt="Menu">
</div>