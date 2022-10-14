(function() {
    // Seleccionamos las horas
    const horas = document.querySelector('#horas');

    // Verificamos la existencia de esas horas
    if (horas) {
        // Buscamos las horas disponibles
        let busqueda = {
            categoria_id: '',
            dia: ''
        }

        // Seleccionamos la categoria
        const categoria = document.querySelector('[name="categoria_id"]');
        // Seleccionamos los dias
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');
        
        // Guardamos en busqueda la categoria
        categoria.addEventListener('change', terminoBusqueda);
        // Guardamos en busqueda el dia
        dias.forEach( dia => dia.addEventListener('change', terminoBusqueda));

        // Guarda los datos seleccionados por el usuario
        function terminoBusqueda(e) {
            // Guardamos el dia y la categoria seleccionadas por el usuario
            busqueda[e.target.name] = e.target.value;

            // Reiniciar los campos ocultos y el selector de horas
            inputHiddenHora.value = '';
            inputHiddenDia.value = '';

            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            // Nos aseguramos que el objeto busqueda este lleno
            if (Object.values(busqueda).includes('')) {
                return;
            }
            // Buscamos los eventos con esa categoria y ese dia
            buscarEventos();
        }

        // Busca el evento con una categoria y dia especificos
        async function buscarEventos() {
            // Extraemos el dia y la categoria
            const { dia , categoria_id } = busqueda;
            // URL para la peticion
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;
            
            // Nos traemos nos resultados
            const resultados = await fetch(url);
            const eventos = await resultados.json();

            // Nos dice que horas estan disponibles para los eventos
            obtenerHorasDisponibles(eventos);
        }

        // Nos indica que horas podemos seleccionar de todas las que hay
        function obtenerHorasDisponibles(eventos) {
            // Reiniciar las horas
            const listadoHoras = document.querySelectorAll('#horas li');
            listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitada'));
            
            // Comprobar eventos ya tomados, y quitar la variable de deshabilitados
            const horasTomadas = eventos.map( evento => evento.hora_id);

            // Transformamos el nodeList de listadoHoras a un Array
            const listadoHorasArray = Array.from(listadoHoras);
            
            // Nos guardamos las horas que no han sido tomadas
            const horasDisponibles = listadoHorasArray.filter( li => !horasTomadas.includes(li.dataset.horaId));
            
            horasDisponibles.forEach(li => li.classList.remove('horas__hora--deshabilitada'));

            // Seleccionamos las horas disponibles
            const horas = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitada)');

            // Seleccionamos una hora de las disponibles
            horas.forEach( hora => hora.addEventListener('click', seleccionarHora));
        }

        // Selecciona una hora de las disponibles
        function seleccionarHora(e) {
            // Si hay horas tomadas no permite seleccionarlas
            if (e.target.classList.contains('horas__hora--deshabilitada')) {
                return;
            }

            // Desabilitar la hora previa, si hay un nuevo click
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            // Agregar una clase de seleccionado a la hora seleccionada
            e.target.classList.add('horas__hora--seleccionada');

            // Agrega la hora seleccionada al input de tipo hidden
            inputHiddenHora.value = e.target.dataset.horaId;

            // Llenar el campo oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;
        }
    }
})();