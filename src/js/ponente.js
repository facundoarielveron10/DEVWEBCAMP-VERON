import Swal from "sweetalert2";

// Seleccionamos el formulario para eliminar un ponente
const formularioEliminar = document.querySelectorAll('#eliminarPonente');
// Agregamos un evento para cuando se elimina un ponente
formularioEliminar.forEach(ponente => {
    ponente.addEventListener('submit', (e) => {
        e.preventDefault();
        Swal.fire({
            title: '¿ESTAS SEGURO?',
            text: "SI ELIMINAS ESTE PONENTE SE ELIMINARAN LOS EVENTOS RELACIONADOS CON EL MISMO!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI, ELIMINAR!',
            cancelButtonText: 'CANCELAR'
        }).then((result) => {
            if (result.isConfirmed) {
                ponente.submit()
            }
        });
    });
});
