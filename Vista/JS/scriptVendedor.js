function inicio() {
    document.getElementById("autocompletadoBuscarCliente").addEventListener("input", buscarCliente, false);
    document.getElementById("id_Agregar_producto_Tabla").addEventListener("click", agregarProductoTabla, false);
    document.getElementById("id_Eliminar_producto_Tabla").addEventListener("click", eliminarProductosTabla, false);
    document.getElementById("listaProductos").addEventListener("click", seleccionarListaProducto, false);
   

}
// const keywords = [
//     "Alfajor Triple Milka Oreo 61g",
//     "Alfajor Milka Mousse Simple 42g",
//     "Papas fritas Lays clásica 379 g",
//     "Chupetin de coca",
//     "Caramelos Sugus",
//     "Manteca Dia 250 g"
// ];
const posicionJson=0;

// implemento Json para recibir de base de datos
let keyword=[
    {id:0,marca:"Milka",nombre:"Alfajor Triple Milka Oreo 61g",precio:300,cantidad:200},
    {id:1,marca:"Milka",nombre:"Alfajor Milka Mousse Simple 42g",precio:300,cantidad:200},
    {id:2,marca:"Leys",nombre:"Papas fritas Lays clásica 379 g",precio:1500,cantidad:200},
    {id:3,marca:"Tatin",nombre:"Chupetin de coca",precio:150,cantidad:200},
    {id:4,marca:"Sugus",nombre:"Caramelos Sugus",precio:30,cantidad:200} 
];  

function buscarCliente() {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");
    const inputTexto = autocompletadoInput.value.toLowerCase();

    const listaCliente = document.getElementById("listaProductos");

    if (inputTexto.trim() === "") {
        listaCliente.classList.add("d-none");
    }
    else {
        //comienza a buscar luego de las 2 coincidencias
        if (inputTexto.length>2) {
            let templista=[];
            listaCliente.classList.remove("d-none");
            //const palabraFiltrada = keyword.filter(keyword => keyword.toLowerCase().includes(inputTexto));
            const AuxPalabraFiltrada = keyword.filter( keyword => templista.push(keyword.nombre));
            const palabraFiltrada = templista.filter(templista => templista.toLowerCase().includes(inputTexto));
            
            //console.log(templista);
            mostrarListadoCliente(palabraFiltrada);        
        }

    }
}

function mostrarListadoCliente(palabraFiltrada) {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");

    const listaCliente = document.getElementById("listaProductos");

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

function seleccionarListaProducto(){
    console.log("selcciono producto lista");
    const filaProductoPrecio=document.getElementById("idfilaPrecio");
   // const filaProductoCantidad=document.getElementById("idfilaCantidad");

   filaProductoPrecio.innerHTML=keyword[posicionJson].precio;
    let cantidamax=keyword[posicionJson].cantidad;
    
    const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');
    filaProductoPrincipal.classList.remove("d-none")
    // filaProductoCantidad.innerHTML=`<td class="col-1 text-center">                                                
    //                         <input type="number" class="form-control text-center" value="1" max="${cantidamax}" min="1">
    //                    </td>`;
}

function eliminarProductosTabla(){
    console.log("eliminos productos");
}


function agregarProductoTabla(){
    //id_Agregar_producto_Tabla   tablaCliente
    console.log(document.getElementById("autocompletadoBuscarCliente").value.length );
    
    if (document.getElementById("autocompletadoBuscarCliente").value.length>=3) {
        console.log("y paso");
       // console.log(document.getElementById("idcantidadinput").value);    
            //esto va evaluar mejor cuando se conecte ala base ya que trae datos de cantidad
        

            let tablaVenta= document.getElementById("tablaProductos");
            let marca=keyword[posicionJson].marca;
            let nombre=keyword[posicionJson].nombre;
            let precio=keyword[posicionJson].precio;
            let cantida=keyword[posicionJson].cantidad;

                                            
            
            //const templetaFila=document.getElementById("idtempleteTablaFila");
            //let clon = templetaFila.content.cloneNode(true);
            //tablaVenta.appendChild(clon);
            //
            ///
            var row = tablaVenta.insertRow(-1);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);

            let filaCantidadInput=document.getElementById("idfilaCantidadinput").value;
           

            cell1.innerHTML = 1;
            cell2.innerHTML = marca;
            cell3.innerHTML = nombre;
            cell4.innerHTML = precio+" $";
            cell5.innerHTML = `<td class=" text-center">${filaCantidadInput}</td>`;
            cell6.innerHTML = `<button type="button" class="btn btn-danger btn-sm text-center"
                                data-btn-grupo="eliminar-cliente"><i
                class="bi bi-trash"></i></button>`;
                //console.log(tablaVenta);


            document.getElementById("idtotal").innerHTML=100+"$";    
        
        
    }
    document.getElementById("autocompletadoBuscarCliente").value="";
    // document.getElementById("idfilaPrecio").innerHTML="";
    
    document.getElementById("idfilaCantidadinput").value=1;
    const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');
    filaProductoPrincipal.classList.add("d-none")
   
}


window.addEventListener("load", inicio, false);


    