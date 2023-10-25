function inicio() {
    document.getElementById("autocompletadoBuscarCliente").addEventListener("input", buscarCliente, false);
    document.getElementById("autocompletadoBuscarCliente").addEventListener("input", filtrar_busqueda_cliente, false);
}
const keywords = [
    "Nathan",
    "Drake",
    "joel",
    "Miller",
    "3",
    "2"
];

function buscarCliente() {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");
    const inputTexto = autocompletadoInput.value.toLowerCase();

    const listaCliente = document.getElementById("listaCliente");

    if (inputTexto.trim() === "") {
        listaCliente.classList.add("d-none");
    }
    else {
        listaCliente.classList.remove("d-none");
        const palabraFiltrada = keywords.filter(keyword => keyword.toLowerCase().includes(inputTexto));
        mostrarListadoCliente(palabraFiltrada);
    }
}

function mostrarListadoCliente(palabraFiltrada) {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");

    const listaCliente = document.getElementById("listaCliente");

    const smsErrorResultado = document.getElementById('smsResultado');

    listaCliente.innerHTML = '';

    if (palabraFiltrada.length === 0) {
        smsErrorResultado.classList.remove("d-none")
    } else {
        smsErrorResultado.classList.add("d-none")

        palabraFiltrada.forEach(listado => {
            const li = document.createElement('li');
            li.textContent = listado;
            li.addEventListener('click', () => {
                autocompletadoInput.value = listado;
                listaCliente.innerHTML = '';
            });
            listaCliente.appendChild(li);
        });
    }
}

function filtrar_busqueda_cliente() {
    // nos traemos los radio button
    let flex_radio_nombre = document.getElementById("flexRadioFiltrarPorNombre");
    let flex_radio_apellido = document.getElementById("flexRadioFiltrarPorApellido");
    let flex_radio_id = document.getElementById("flexRadioFiltrarPorId");
    let flex_radio_email = document.getElementById("flexRadioFiltrarPorEmail");
    let input_busqueda = document.getElementById("autocompletadoBuscarCliente");
    let input_filtrar = input_busqueda.value.toLowerCase();
    let tabla_usuarios = document.getElementById("tablaCliente");
    let array_tr = tabla_usuarios.querySelectorAll("tbody tr");
    for (let columna of array_tr) {
        if (flex_radio_apellido.checked) {
            // por apellido
            // obtener todos los td correspondientes a apellido
            let columna_cliente_apellido = columna.cells[3];
            let columna_cliente_apellido_valor = columna_cliente_apellido.textContent;
            // mostrar en la tabla los datos que coincincidan con el apellido escrito
            if (columna_cliente_apellido_valor.toLowerCase().indexOf(input_filtrar) > -1) {
                columna.classList.remove("d-none");
            } else {
                columna.classList.add("d-none");
            }
        } else if (flex_radio_id.checked) {
            // por id
            // obtener todos los td correspondientes a id
            let columna_cliente_id = columna.cells[1];
            let columna_cliente_id_valor = columna_cliente_id.textContent;
            // mostrar en la tabla los datos que coincincidan con el id escrito
            if (columna_cliente_id_valor.toLowerCase().indexOf(input_filtrar) > -1) {
                columna.classList.remove("d-none");
            } else {
                columna.classList.add("d-none");
            }
        } else if (flex_radio_email.checked) {
            // por email
            // obtener todos los td correspondientes a email
            let columna_cliente_email = columna.cells[5];
            let columna_cliente_email_valor = columna_cliente_email.textContent;
            // mostrar en la tabla los datos que coincincidan con el email escrito
            if (columna_cliente_email_valor.toLowerCase().indexOf(input_filtrar) > -1) {
                columna.classList.remove("d-none");
            } else {
                columna.classList.add("d-none");
            }
        } else {
            // por nombre (por defecto)
            // obtener todos los td correspondientes a nombre
            let columna_nombre = columna.cells[2];
            let columna_nombre_valor = columna_nombre.textContent;
            // mostrar en la tabla los datos que coincincidan con el nombre escrito
            if (columna_nombre_valor.toLowerCase().indexOf(input_filtrar) > -1) {
                columna.classList.remove("d-none");
            } else {
                columna.classList.add("d-none");
            }
        }
    }
}

window.addEventListener("load", inicio, false);