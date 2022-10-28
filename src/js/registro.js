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

        // Mostramos los eventos
        mostrarEventos();
        
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
                    title: 'ERROR',
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
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'No hay eventos, añade hasta 5 del lado izquierdo';
                noRegistro.classList.add('registro__texto');
                resumen.appendChild(noRegistro);
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

        async function submitFormulario(e) {
            e.preventDefault();

            // Obtener el regalo
            const regaloId = document.querySelector('#regalo').value;

            // Obtener los eventos
            const eventosId = eventos.map(evento => evento.id);
        
            if (eventosId.length === 0 || regaloId === '') {
                Swal.fire({
                    title: 'ERROR',
                    text: 'ELIGE AL MENOS UN EVENTO Y UN REGALO',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // FORMDATA
            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regaloId);

            // Mandamos los datos al Servidor
            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            // Recibimos los datos
            const resultado = await respuesta.json();
            if (resultado.resultado) {
                Swal.fire({
                   title: 'REGISTRO EXITOSO',
                   text: 'TUS CONFERENCIAS SE HAN ALMACENADOS Y TU REGISTRO FUE EXITOSO, TE ESPERAMOS EN DEVWEBCAPM',
                   icon: 'success',
                   confirmButtonText: 'OK'
                }).then( () => location.href = `/boleto?id=${resultado.token}`);
            } else {
                Swal.fire({
                    title: 'ERROR',
                    text: 'HUBO UN ERROR',
                    icon: 'error',
                    confirmButtonText: 'OK'
                 }).then( () => location.reload());
            }
        }
        
    }
})();