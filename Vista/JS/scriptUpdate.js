function inicio() {
    document.getElementById("formIndicadorUpdate").addEventListener("click", formulario, false);

    //Boton Update
    let boton = document.querySelectorAll("button[data-btn-grupo='modificar-indicador']");
    for (let botonUpdate of boton) {
        botonUpdate.addEventListener("click", EditarIndicador, false);
    }
}

function formulario(evento) {

    evento.preventDefault();
    if (validarFormulario()) {
        mostrarModal();
        setTimeout(enviarFormulario, 1000);
    }
}

function enviarFormulario() {
    document.getElementById("formIndicadorUpdate").submit();
}

function EditarIndicador(evento) {
    const modalEditarCliente = new bootstrap.Modal(document.getElementById('modalUpdateIndicador'));
    modalEditarCliente.show();

    let botonActual = evento.target;

    let filaIndicador = botonActual.closest("tr");

    let IDIndicador = filaIndicador.querySelector("td:nth-child(2)").textContent;
    let IDUsuario = filaIndicador.querySelector("td:nth-child(3)").textContent;
    let IDUsuarioNivel = filaIndicador.querySelector("td:nth-child(4)").textContent;
    let IDProducto = filaIndicador.querySelector("td:nth-child(5)").textContent;
    let Producto = filaIndicador.querySelector("td:nth-child(6)").textContent;
    let marca = filaIndicador.querySelector("td:nth-child(7)").textContent;
    let cantidad = filaIndicador.querySelector("td:nth-child(8)").textContent;
    let IDCategoria = filaIndicador.querySelector("td:nth-child(9)").textContent;
    let Categoria = filaIndicador.querySelector("td:nth-child(10)").textContent;

    let tituloModal = document.getElementById("tituloModal");
    let inputIDIndicador = document.getElementById("IDIndicador");
    let inputIDUsuario = document.getElementById("IDUsuario");
    let inputIDUsuarioNivel = document.getElementById("Nivel");
    let inputIDProducto = document.getElementById("IDProducto");
    let inputProducto = document.getElementById("Producto");
    let inputMarca = document.getElementById("Marca");
    let inputCantidad = document.getElementById("Cantidad");
    let inputIDCategoria = document.getElementById("IDCategoria");
    let inputCategoria = document.getElementById("Categoria");

    tituloModal.textContent = "Editar Indicador";
    inputIDIndicador.value = IDIndicador;
    inputIDUsuario.value = IDUsuario;
    inputIDUsuarioNivel.value = IDUsuarioNivel;
    inputIDProducto.value = IDProducto;
    inputProducto.value = Producto;
    inputMarca.value = marca;
    inputCantidad.value = cantidad;
    inputIDCategoria.value = IDCategoria;
    inputCategoria.value = Categoria;
}

function validarFormulario() {
    //Validacion Nivel
    let nivelInput = document.getElementById("Nivel");
    let nivel = nivelInput.value;

    let smsErrorNivel = document.getElementById("errorEditarNivel");
    let expresionRegularNivel = /^[0-9]+$/;;

    nivelInput.classList.remove("is-invalid");
    nivelInput.classList.remove("is-valid");

    if (nivel.trim() === "") {
        nivelInput.classList.add("is-invalid");
        smsErrorNivel.innerHTML = "El campo Nivel se encuentra vacio";
        return false;
    }
    if (!expresionRegularNivel.test(nivel)) {
        nivelInput.classList.add("is-invalid");
        smsErrorNivel.innerHTML = "El campo Nivel solo acepta caracteres numericos"
        return false;
    } else {
        nombreInput.classList.add("is-valid");
    }
    return true;
}

function mostrarModal() {
    swal({
        title: "Indicador Modificado",
        icon: "success",
        button: "Cerrar",
    });
}
window.addEventListener("load", inicio, false);