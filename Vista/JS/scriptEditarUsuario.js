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
    let usuarioID = filaUsuario.querySelector("td:nth-child(2)").textContent;
    // let usuarioTurno = filaUsuario.querySelector("td:nth-child(3)").textContent;
    // let usuarioPerfil = filaUsuario.querySelector("td:nth-child(2)").textContent;
    let usuarioNombre = filaUsuario.querySelector("td:nth-child(5)").textContent;
    let usuarioPassword = filaUsuario.querySelector("td:nth-child(6)").textContent;
    let usuarioEmail = filaUsuario.querySelector("td:nth-child(8)").textContent;

    // volcando los datos de un usuario al formulario del modal
    let tituloDetalleUsuario = document.getElementById("modalTitulo");
    let formularioUsuarioID = document.getElementById("IDUpdate");
    // let fomularioUsuarioTurno = document.getElementById("TurnosUpdate");
    // let formularioUsuarioPerfil = document.getElementById("PerfilesUpdate");
    let formularioUsuarioNombre = document.getElementById("NombreUpdate");
    let formularioUsuarioPassword = document.getElementById("ContraseñaUpdate");
    let formularioUsuarioEmail = document.getElementById("EmailUpdate");

    tituloDetalleUsuario.innerHTML = "Editar Usuario:" + usuarioNombre;
    formularioUsuarioID.value = usuarioID;
    // fomularioUsuarioTurno.value = usuarioTurno;
    // formularioUsuarioPerfil.value = usuarioPerfil;
    formularioUsuarioNombre.value = usuarioNombre;
    formularioUsuarioPassword.value = usuarioPassword;
    formularioUsuarioEmail.value = usuarioEmail;
    // console.log(usuarioEmail);


}

function enviarformulario(e) {
    e.preventDefault();
    document.getElementById("formEditaUsuario").submit();

}

function formulario2(e) {
    evento.preventDefault();
    document.getElementById('frmCreaUsuario').submit();
}