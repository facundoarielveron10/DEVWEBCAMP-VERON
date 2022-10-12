(function() {
    // Seleccionamos el input para escribir los tags
    const tagsInput = document.querySelector('#tags_input');
    // Si existe el input para los tag
    if (tagsInput) {
        // Seleccionamos todos los divs que contienen los tags
        const tagsDiv = document.querySelector('#tags');
        // Seleccionamos el input hiddent
        const tagsInputHidden = document.querySelector('[name="tags"]');
        // Guardamos las etiquetas en un arreglo
        let tags = [];
        // Escuchar los cambios en el input
        tagsInput.addEventListener('keypress', guardarTag);
        // Mira si el usuario esta escribiendo algo en el input
        function guardarTag(e) {
            if (e.keyCode === 44) {
                // Si enviamos el input vacio
                if (e.target.value.trim() === '' || e.target.value.trim() < 1) {
                    return;
                }
                // Colocamos por default el input
                e.preventDefault();
                // Vamos guardando los tags
                tags = [...tags, e.target.value.trim()];
                // Limpiamos el input
                tagsInput.value = '';

                // Mostramos los tags
                mostrarTags();
            }
        }

        // Muestra todos los tags ingresados por el usuario
        function mostrarTags() {
            tagsDiv.textContent = '';
            tags.forEach(tag => {
                // Creamos la etiqueta
                const etiqueta = document.createElement('LI');
                // Le agregamos una clase para darle estilo
                etiqueta.classList.add('formulario__tag');
                // Le agregamos el contenido a la etiqueta
                etiqueta.textContent = tag;
                etiqueta.ondblclick = eliminarTag;
                // Mostramos la etiqueta en el DOM
                tagsDiv.appendChild(etiqueta);
            });
            
            actualizarInputHidden();
        }

        // Actualiza el input al agregar y quitar etiquetas del arreglo
        function actualizarInputHidden() {
            tagsInputHidden.value = tags.toString();
        }

        // Elimina un tag
        function eliminarTag(e) {
            e.target.remove();
            tags = tags.filter(tag => tag !== e.target.textContent);
            actualizarInputHidden();
        }
    }
})();