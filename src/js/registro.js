import Swal from "sweetalert2";

(function () {
    // Todos los eventos agregados
    let eventos = [];
    
    // Seleccionamos la seccion de resumen
    const resumen = document.querySelector('#registro-resumen');
    
    // Si existe resumen
    if (resumen) {
        // Seleccionamos el boton de agregar
        const eventosBoton = document.querySelectorAll('.evento__agregar');
        // Recorremos todos los botones
        eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEventos));

        // Seleccionamos el formulario para enviar el registro
        const formularioRegistro = document.querySelector('#registro');
        // Agregamos un evento para enviar los datos
        formularioRegistro.addEventListener('submit', submitFormulario);

        
        // Selecciona y guarda el evento
        function seleccionarEventos(e) {
            // Si no hay mas de 5 eventos
            if (eventos.length < 5) {
                // Desabilitar el evento
                e.target.disabled = true;
                // Guardamos el evento seleccionado
                eventos = [...eventos, {
                    id: e.target.dataset.id,
                    titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }];

                mostrarEventos();
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'MAXIMO 5 EVENTOS POR REGISTRO',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }

        // Mostramos los eventos seleccionados
        function mostrarEventos() {
            // Limpiar el HTML
            limpiarEventos();

            if (eventos.length > 0) {
                // Recorremos los eventos
                eventos.forEach( evento => {
                    // Creamos un DIV para el evento y le agregamos una clase
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento');

                    // Creamos un H3 para el titulo del evento y le agregamos una clase
                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    // Creamos un boton para eliminar una seleccion
                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = '<i class="fa-solid fa-trash"></i>';
                    botonEliminar.onclick = function () {
                        eliminarEvento(evento.id);
                    }

                    // Renderizamos en el HTML
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);
                });
            }
        }

        // Elimina un evento seleccionado
        function eliminarEvento(id) {
            // Guardamos en eventos todos los eventos que son distintos al id a borrar
            eventos = eventos.filter( evento => evento.id !== id );
            // Habilitamos el boton de agregar el evento
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            // Volvemos a cargar los eventos en pantalla
            mostrarEventos();
        }

        // Limpiamos el HTML para no repetir eventos
        function limpiarEventos() {
            // Sacar los repetidos
            while(resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }

        function submitFormulario(e) {
            e.preventDefault();

            // Obtener el regalo
            const regaloId = document.querySelector('#regalo').value;

            // Obtener los eventos
            const eventosId = eventos.map(evento => evento.id);
        
            if (eventosId.length === 0 || regaloId === '') {
                Swal.fire({
                    title: 'Error',
                    text: 'ELIGE AL MENOS UN EVENTO Y UN REGALO',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
        }
        
    }
})();