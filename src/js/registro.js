(function () {
    // Todos los eventos agregados
    let eventos = [];
    // Seleccionamos el boton de agregar
    const eventosBoton = document.querySelectorAll('.evento__agregar');
    // Recorremos todos los botones
    eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEventos));

    // Selecciona y guarda el evento
    function seleccionarEventos(e) {
        // Desabilitar el evento
        e.target.disabled = true;
        // Guardamos el evento seleccionado
        eventos = [...eventos, {
            id: e.target.dataset.id,
            titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
        }];
        console.log(eventos);
    }

})();