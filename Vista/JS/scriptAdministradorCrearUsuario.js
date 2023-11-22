// function confirmar(e){
//     if (confirm("¿Estas seguro que desea eliminar este usuario?")){
//         return true;
//     }
//     els

// e {
//         e.preventDefault();
//     }
// }
// let linkborrar = document.querySelectorAll(".table__item__link");
// for (var i=0; i< linkborrar.length;i++){
//     linkborrar[i].addEventListener('click',confirmar)
// }

function inicio() {

    //Boton submit
    document.getElementById("frmCrearUsuario").addEventListener("submit", Formulario, false);

    //Boton Detalle
    let botonMostrarDetalle = document.querySelectorAll("button[data-btn-grupo='modificar-usuario']");
    for (let botones of botonMostrarDetalle) {
        botones.addEventListener("click", mostrarDetalle, false);
    }

    //Boton Editar
    let botonEditar = document.querySelectorAll("button[data-btn-grupo='eliminar-usuario']");
    for (let botones of botonEditar) {
        botones.addEventListener("click", EditarCliente, false);
    }
}