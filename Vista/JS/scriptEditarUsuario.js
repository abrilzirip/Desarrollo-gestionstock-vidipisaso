window.addEventListener("load", inicio, false);

function inicio() {
    document.getElementById("formEditaUsuario").addEventListener("submit", enviarformulario, false);
    let boton = document.querySelectorAll("button[edit='usuario']"); //agrego el atributo del boton
    for (let botonEditar of boton) {
        botonEditar.addEventListener("click", EditarUsuario, false);
    }
}

function EditarUsuario(e) {
    const myModal = new bootstrap.Modal(document.getElementById('editarModal'));
    myModal.show();
    let botonActual = e.target;

    let filaUsuario = botonActual.closest("tr"); //Closest encuentra el elemento más cercano que coincida con el selector
    // let usuarioID = filaUsuario.querySelector("td:nth-child(2)").textContent;
    // let usuarioTurno = filaUsuario.querySelector("td:nth-child(3)").textContent;
    // let usuarioPerfil = filaUsuario.querySelector("td:nth-child(2)").textContent;
    let usuarioNombre = filaUsuario.querySelector("td:nth-child(2)").textContent;
    let usuarioPassword = filaUsuario.querySelector("td:nth-child(3)").textContent;
    let usuarioEmail = filaUsuario.querySelector("td:nth-child(5)").textContent;

    // volcando los datos de un usuario al formulario del modal
    let tituloDetalleUsuario = document.getElementById("modalTitulo");
    // let formularioUsuarioID = document.getElementById("editaUsuarioId");
    // let fomularioUsuarioTurno = document.getElementById("Id_Turno");
    // let formularioUsuarioPerfil = document.getElementById("Id_Perfil");
    let formularioUsuarioNombre = document.getElementById("editaNombre");
    let formularioUsuarioPassword = document.getElementById("editaPassword");
    let formularioUsuarioEmail = document.getElementById("editaEmail");

    tituloDetalleUsuario.innerHTML = "Editar Usuario:" + usuarioNombre;
    // formularioUsuarioID.value = usuarioID;
    // fomularioUsuarioTurno.value = usuarioTurno;
    // formularioUsuarioPerfil.value = usuarioPerfil;
    formularioUsuarioNombre.value = usuarioNombre;
    formularioUsuarioPassword.value = usuarioPassword;
    formularioUsuarioEmail.value = usuarioEmail;
    // console.log(usuarioEmail);


}