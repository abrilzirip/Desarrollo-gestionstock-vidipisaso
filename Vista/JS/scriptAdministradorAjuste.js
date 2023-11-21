function inicio() {
    document.getElementById("autocompletadoBuscarProducto").addEventListener("input", buscarProducto, false);
    document.getElementById("listaProductos").addEventListener("click", seleccionarListaProducto, false);
    document.getElementById("idbotonGuardar").addEventListener("click", e => { ActualizarPrecio(e) }, false);

}



let ProductoSeleccionado;
let DatosEnviados = [];



function agregarProductoTabla() {



    if (document.getElementById("autocompletadoBuscarProducto").value.length >= 3) {



        let tablaVenta = document.getElementById("idfilaProductoprincipal");
        let marca = ProductoSeleccionado.MARCA;
        let nombre = ProductoSeleccionado.NOMBRE;
        let precio = ProductoSeleccionado.PROD_PRECIO_VENTA;

        console.log(precio);
        // let cantida=keyword[posicionJson].cantidad;

        let filaCantidadInput = document.getElementById("idfilaCantidadinput").value;


        tablaVenta.insertRow(0).innerHTML = ` <tr>
            <td class="col-1 ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center">${marca}</td>
            <td class="col-1 ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center">${nombre}</td>
            <td class="col-1 ocultar-en-pantalla-xs ocultar-en-pantalla-sm ocultar-en-pantalla-md text-center">${precio}</td>
            <td><input type="number" id="idvalorDeAjuste" class="form-control text-center" value="5"  min="5"  max="100" step="5"></td>
        </tr>`;

    }



}

function buscarProducto() {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarProducto");
    const inputTexto = autocompletadoInput.value.toLowerCase();

    const listaCliente = document.getElementById("listaProductos");

    if (inputTexto.trim() === "") {
        listaCliente.classList.add("d-none");
    } else {
        //comienza a buscar luego de las 2 coincidencias
        if (inputTexto.length > 3) {

            listaCliente.classList.remove("d-none");

            TraerProductosdeDDBB(inputTexto);

        }

    }
}

function mostrarListadoProducto(palabraFiltrada, objetoProductoSeleccionado) {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarProducto");

    const listaCliente = document.getElementById("listaProductos");

    const smsErrorResultado = document.getElementById('smsResultado');

    listaCliente.innerHTML = '';

    if (palabraFiltrada.length === 0) {
        smsErrorResultado.classList.remove("d-none")
    } else {
        smsErrorResultado.classList.add("d-none")
            //console.log("cantidad de obtejtos  "+objetoProductoSeleccionado);
        objetoProductoSeleccionado.forEach(obj => {
            const li = document.createElement('li');
            li.textContent = obj.NOMBRE + " " + obj.MARCA;
            li.addEventListener('click', () => {
                autocompletadoInput.value = obj.NOMBRE + " " + obj.MARCA;
                listaCliente.innerHTML = '';
                ProductoSeleccionado = obj;
                agregarProductoTabla();
            });
            listaCliente.appendChild(li);
        });
    }
}

function seleccionarListaProducto() {
    console.log("selcciono producto lista");
    // let filaProductoPrecio = document.getElementById("idfilaPrecio");
    let filaProductoMarca = document.getElementById("idfilamarca");
    let filaProductoDescripcion = document.getElementById("idfiladecripcion");
    //idfiladecripcion  idfilamarca

    // filaProductoPrecio.innerHTML = ProductoSeleccionado.PROD_PRECIO_VENTA;
    filaProductoMarca.innerHTML = ProductoSeleccionado.MARCA;
    filaProductoDescripcion.innerHTML = ProductoSeleccionado.NOMBRE;


    const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');

    filaProductoPrincipal.classList.remove("d-none")

    const filaCantidadinput = document.getElementById('idfilaCantidadinput');


}

function ActualizarPrecio(e) {
    e.preventDefault();
    console.log("comenzo la actualizacion");



    ActualizarProductoStockenBase();
}


function ActualizarProductoStockenBase() {



    let formaulrioEnvio = document.getElementById("idformilarioUpdateSotck");
    //datostxtstock


    fetch('../Controlador/ActualizarProductoStock.php', {
        method: 'POST',
        body: new FormData(formaulrioEnvio)
    })


    .then((data) => {

        console.log("seconecto ala base" + data);

        swal("Actualizo Stock", "", "success");
        setTimeout(function() {
            window.location.reload();
        }, 4000);

    });
}


function TraerProductosdeDDBB(inputTexto) {
    let datasalida = "",
        resultado = "";
    fetch('../Controlador/MostrarProductos.php', {
        method: 'POST'
    })

    .then((res) => res.json())
        //.then((data)=>console.log(data));
        .then((data) => {

            datasalida = JSON.parse(JSON.stringify(data));

            let templista = [];
            const AuxPalabraFiltrada = datasalida.filter(datasalida => templista.push(datasalida.NOMBRE), resultado = datasalida);
            const palabraFiltrada = templista.filter(templista => templista.toLowerCase().includes(inputTexto));
            //mostrarListadoProducto(palabraFiltrada); 


            //console.log(datasalida);
            let objetoArray = [];
            datasalida.forEach(element => {
                // console.log(element.NOMBRE);    
                if (palabraFiltrada.includes(element.NOMBRE)) {
                    //ProductoSeleccionado=element;
                    objetoArray.push(element);
                    //console.log("++"+element.NOMBRE)

                }


            });

            mostrarListadoProducto(palabraFiltrada, objetoArray);

        });
    return resultado;
}

window.addEventListener("load", inicio, false);




// function inicio() {
//     document.getElementById("autocompletadoBuscarCliente").addEventListener("input", buscarCliente, false);
//     // document.getElementById("id_Agregar_producto_Tabla").addEventListener("click", agregarProductoTabla, false);
//     // document.getElementById("id_Eliminar_producto_Tabla").addEventListener("click", eliminarProductosTabla, false);
//     document.getElementById("listaProductos").addEventListener("click", seleccionarListaProducto, false);
//     document.getElementById("id_modificar_cantidad_producto").addEventListener("click", e => { ActualizarProductoStock(e) }, false);
// }

// const posicionJson = 0;
// let cantidadDeFilas = 1,
//     subTotal = 0,
//     TotalApagar = 0;
// let ProductoSeleccionado;
// localStorage.setItem("cantidadDeFilas", cantidadDeFilas);
// localStorage.setItem("subTotal", subTotal);

// function buscarCliente() {

//     const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");
//     const inputTexto = autocompletadoInput.value.toLowerCase();

//     const listaCliente = document.getElementById("listaProductos");

//     if (inputTexto.trim() === "") {
//         listaCliente.classList.add("d-none");
//     } else {
//         //comienza a buscar luego de las 2 coincidencias
//         if (inputTexto.length > 3) {

//             listaCliente.classList.remove("d-none");

//             TraerProductosdeDDBB(inputTexto);

//         }

//     }
// }



// function mostrarListadoCliente(palabraFiltrada, objetoProductoSeleccionado) {

//     const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");

//     const listaCliente = document.getElementById("listaProductos");

//     const smsErrorResultado = document.getElementById('smsResultado');

//     listaCliente.innerHTML = '';

//     if (palabraFiltrada.length === 0) {
//         smsErrorResultado.classList.remove("d-none")
//     } else {
//         smsErrorResultado.classList.add("d-none")

//         //console.log("cantidad de obtejtos  "+objetoProductoSeleccionado.length);
//         objetoProductoSeleccionado.forEach(obj => {
//             const li = document.createElement('li');
//             // console.log("+-"+obj.NOMBRE);
//             li.textContent = obj.NOMBRE + " " + obj.MARCA + " " +
//                 obj.PROD_PRECIO_VENTA + "$";


//             if (obj.CANTIDAD == 0) {
//                 li.textContent = obj.NOMBRE + " Nos Quedamos sin Stock";
//                 listaCliente.appendChild(li);
//                 ProductoSeleccionado = obj;
//             } else {
//                 li.addEventListener('click', () => {
//                     autocompletadoInput.value = obj.NOMBRE;
//                     listaCliente.innerHTML = '';
//                     ProductoSeleccionado = obj;
//                 });
//                 listaCliente.appendChild(li);
//             }
//         });
//     }
// }



// function seleccionarListaProducto() {
//     console.log("selcciono producto lista");
//     // let filaProductoPrecio=document.getElementById("idfilaPrecio");
//     let filaProductoMarca = document.getElementById("idfilamarca");
//     let filaProductoDescripcion = document.getElementById("idfiladecripcion");
//     //idfiladecripcion  idfilamarca

//     // filaProductoPrecio.innerHTML=ProductoSeleccionado.PROD_PRECIO_VENTA;
//     filaProductoMarca.innerHTML = ProductoSeleccionado.MARCA;
//     filaProductoDescripcion.innerHTML = ProductoSeleccionado.NOMBRE;


//     const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');

//     filaProductoPrincipal.classList.remove("d-none")

//     const filaCantidadinput = document.getElementById('idfilaCantidadinput');


// }






// function TraerProductosdeDDBB(inputTexto) {
//     let datasalida = "",
//         resultado = "";
//     fetch('../Controlador/MostrarProductos.php', {
//         method: 'POST'
//     })

//     .then((res) => res.json())

//     .then((data) => {
//         console.log(data);
//         datasalida = JSON.parse(JSON.stringify(data));

//         let templista = [];
//         const AuxPalabraFiltrada = datasalida.filter(datasalida => templista.push(datasalida.NOMBRE), resultado = datasalida);
//         const palabraFiltrada = templista.filter(templista => templista.toLowerCase().includes(inputTexto));

//         console.log("---" + resultado[0].PROD_PRECIO_VENTA);
//         //ProductoSeleccionado=resultado[0];

//         datasalida.forEach(element => {

//             if (element.NOMBRE == palabraFiltrada) {
//                 ProductoSeleccionado = element;
//                 console.log("++" + element.NOMBRE)
//             }


//         });

//         mostrarListadoCliente(palabraFiltrada, ProductoSeleccionado);


//     });
//     return resultado;
// }

// function seleccionarListaProducto() {
//     //console.log("selcciono producto lista");
//     const filaProductoPrecio = document.getElementById("idfilaPrecio");
//     // const filaProductoCantidad=document.getElementById("idfilaCantidad");

//     if (ProductoSeleccionado.CANTIDAD != 0) {
//         filaProductoPrecio.innerHTML = ProductoSeleccionado.PROD_PRECIO_VENTA + " $";


//         let cantidamax = ProductoSeleccionado.CANTIDAD;

//         const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');

//         filaProductoPrincipal.classList.remove("d-none")

//         const filaCantidadinput = document.getElementById('idfilaCantidadinput');
//         filaCantidadinput.setAttribute("max", cantidamax);
//     }
// }




// window.addEventListener("load", inicio, false);