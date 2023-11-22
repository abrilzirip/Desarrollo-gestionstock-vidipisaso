window.addEventListener("load", inicio, false);


function inicio() {
    let btnEditar = document.querySelectorAll("td>button[editar='tabla']");
    let btnCargar = document.getElementById('btnInsertar');
    document.getElementById('formUpdate').addEventListener('submit', formulario);
    btnCargar.addEventListener('click', cargarProducto, false);

    for (let editarTabla of btnEditar) {
        editarTabla.addEventListener('click', editarProducto, false)
    }
}

function editarProducto(evento) {
    const modalEditarProducto = new bootstrap.Modal(document.getElementById('modalUpdate'));
    modalEditarProducto.show();

    let botonActual = evento.target;
    let filaProducto = botonActual.closest("tr");
    let idProducto = filaProducto.querySelector("td:nth-child(1)").textContent;
    let idSubcategoria = filaProducto.querySelector("td:nth-child(2)").textContent;
    let nombre = filaProducto.querySelector("td:nth-child(4)").textContent;
    let marca = filaProducto.querySelector("td:nth-child(5)").textContent;
    let compra = filaProducto.querySelector("td:nth-child(6)").textContent;
    let venta = filaProducto.querySelector("td:nth-child(7)").textContent;

    let tituloM = document.getElementById('tituloModal');
    let inputID = document.getElementById('id');
    let inputSubcategoria = document.getElementById('subcategoria');
    let inputNombre = document.getElementById('pNombre');
    let inputMarca = document.getElementById('marca');
    let inputPrecioCompra = document.getElementById('precioCompra');
    let inputPrecioVenta = document.getElementById('precioVenta');

    tituloM.innerHTML = "Editar Producto: " + nombre;
    inputID.value = idProducto;
    inputSubcategoria.value = idSubcategoria;
    inputNombre.value = "tomate diego";
    inputMarca.value = marca;
    inputPrecioCompra.value = compra;
    inputPrecioVenta.value = venta;

}

function cargarProducto() {
    const modalCargarProducto = new bootstrap.Modal(document.getElementById('modalCarga'));
    modalCargarProducto.show();
}

function formulario(evento) {
    evento.preventDefault();
    document.getElementById('formUpdate').submit();
}