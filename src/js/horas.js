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
        
        // Guardamos en busqueda la categoria
        categoria.addEventListener('change', terminoBusqueda);
        // Guardamos en busqueda el dia
        dias.forEach( dia => dia.addEventListener('change', terminoBusqueda));

        // Guarda los datos seleccionados por el usuario
        function terminoBusqueda(e) {
            // Guardamos el dia y la categoria seleccionadas por el usuario
            busqueda[e.target.name] = e.target.value;
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
            obtenerHorasDisponibles();
        }

        function obtenerHorasDisponibles() {
            
        }
    }
})();