(function(){
    // Seleccionamos el input de ponentes
    const ponentesInput = document.querySelector('#ponentes');
    
    // Si existe los ponentes
    if (ponentesInput) {
        // Datos necesarios para los ponentes
        let ponentes = [];
        let ponentesFiltrados = [];

        // Seleccionamos el listado de los ponentes
        const listadoPonentes = document.querySelector('#listado-ponentes');
        // Seleccionamos el input de ponente
        const ponenteHidden = document.querySelector('[name="ponente_id"]');


        // Nos traemos todos los ponentes
        obtenerPonentes();

        // Cada vez que se ingrese algo en el input buscamos un ponente
        ponentesInput.addEventListener('input', buscarPonentes);

        // Se trae todos los ponentes atraves de una API
        async function obtenerPonentes() {
            // URL para la peticion
            const url = `/api/ponentes`;
            
            // Nos traemos nos resultados
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            formatearPonentes(resultado);
        }

        // Formatea los Ponentes, es decir quitarles datos irrelevantes
        function formatearPonentes(arrayPonentes = []) {
            ponentes = arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            });
        }

        // Busca un ponente con lo ingresado en el input
        function buscarPonentes(e) {
            // Guardamos lo escrito por el usuario
            const busqueda = e.target.value;

            if (busqueda.length > 3) {
                // Nos busca en mayuscula o minuscula no importa lo ingresado
                const expresion = new RegExp(busqueda, 'i');
                ponentesFiltrados = ponentes.filter(ponente => {
                    if (ponente.nombre.toLowerCase().search(expresion) != -1) {
                        return ponente;
                    }
                });
            } else {
                ponentesFiltrados = [];
            }
            
            // Mostramos los ponentes filtrados
            mostrarPonentes();
        }

        // Muestra una lista con los ponentes filtrados
        function mostrarPonentes() {
            // Limpiamos los registros previos
            while(listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            // Si hay algo en ponentes filtrados entonces mostralos
            if (ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    // Creamos el listado con HTML
                    const ponenteHTML = document.createElement('LI');
                    ponenteHTML.classList.add('listado-ponentes__ponente');
                    ponenteHTML.textContent = ponente.nombre;
                    ponenteHTML.dataset.ponenteId = ponente.id;
                    ponenteHTML.onclick = seleccionarPonente;
    
                    // Añadir al DOM
                    listadoPonentes.appendChild(ponenteHTML);
                });
            } else {
                // No se pudieron encontrar resultados
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes__no-resultado');
                noResultados.textContent = 'No hay resultado para tu busqueda';
                listadoPonentes.appendChild(noResultados);
            }
        }

        // Hace visible para el usuario el ponente seleccionado
        function seleccionarPonente(e) {
            // Seleccionamos el ponente
            const ponente = e.target;

            // Removemos la clase previa
            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado');
            if (ponentePrevio) {
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado');
            }

            // Le agregamos la clase que lo resalta
            ponente.classList.add('listado-ponentes__ponente--seleccionado');

            ponenteHidden.value = ponente.dataset.ponenteId;
        }
    }
})();