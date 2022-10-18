// Menu de Hamburguesa
const menu = document.querySelector('.dashboard__hamburguesa--icono');
const sidebar = document.querySelector('.dashboard__sidebar');
menu.addEventListener('click', (e) => {
    sidebar.classList.toggle('mostrar');
});