function inicio() {
    document.getElementById("autocompletadoBuscarCliente").addEventListener("input", buscarCliente, false);
    document.getElementById("id_Agregar_producto_Tabla").addEventListener("click", agregarProductoTabla, false);
    document.getElementById("id_Eliminar_producto_Tabla").addEventListener("click", eliminarProductosTabla, false);
    document.getElementById("listaProductos").addEventListener("click", seleccionarListaProducto, false);
    document.getElementById("id_modificar_cantidad_producto").addEventListener("click",e=>{ ActualizarProductoStock(e)},false);
}

const posicionJson=0;
let cantidadDeFilas=1, subTotal=0,TotalApagar=0;
let ProductoSeleccionado;
localStorage.setItem("cantidadDeFilas", cantidadDeFilas);
localStorage.setItem("subTotal", subTotal);

function buscarCliente() {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");
    const inputTexto = autocompletadoInput.value.toLowerCase();

    const listaCliente = document.getElementById("listaProductos");

    if (inputTexto.trim() === "") {
        listaCliente.classList.add("d-none");
    }
    else {
        //comienza a buscar luego de las 2 coincidencias
        if (inputTexto.length>3) {

            listaCliente.classList.remove("d-none");

            TraerProductosdeDDBB(inputTexto);
       
        }

    }
}



function mostrarListadoCliente(palabraFiltrada,objetoProductoSeleccionado) {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarCliente");

    const listaCliente = document.getElementById("listaProductos");

    const smsErrorResultado = document.getElementById('smsResultado');

    listaCliente.innerHTML = '';

    if (palabraFiltrada.length === 0) {
        smsErrorResultado.classList.remove("d-none")
    } else {
        smsErrorResultado.classList.add("d-none")

        //console.log("cantidad de obtejtos  "+objetoProductoSeleccionado.length);
            objetoProductoSeleccionado.forEach(obj=>{
                const li = document.createElement('li'); 
               // console.log("+-"+obj.NOMBRE);
                li.textContent = obj.NOMBRE+" "+obj.MARCA+" "+
                obj.PROD_PRECIO_VENTA+"$";
                

                if (obj.CANTIDAD==0) {
                    li.textContent=obj.NOMBRE+" Nos Quedamos sin Stock";
                    listaCliente.appendChild(li);
                    ProductoSeleccionado=obj;
                }else{
                    li.addEventListener('click', () => {
                    autocompletadoInput.value = obj.NOMBRE;
                    listaCliente.innerHTML = '';
                    ProductoSeleccionado=obj;
                    });
                    listaCliente.appendChild(li);              
                }      
        });
    }
}



function seleccionarListaProducto(){
    console.log("selcciono producto lista");
    // let filaProductoPrecio=document.getElementById("idfilaPrecio");
    let filaProductoMarca=document.getElementById("idfilamarca");
    let filaProductoDescripcion=document.getElementById("idfiladecripcion");
    //idfiladecripcion  idfilamarca

    // filaProductoPrecio.innerHTML=ProductoSeleccionado.PROD_PRECIO_VENTA;
    filaProductoMarca.innerHTML=ProductoSeleccionado.MARCA;
    filaProductoDescripcion.innerHTML=ProductoSeleccionado.NOMBRE;


    const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');

    filaProductoPrincipal.classList.remove("d-none")

    const filaCantidadinput = document.getElementById('idfilaCantidadinput');


}






function TraerProductosdeDDBB(inputTexto){
    let datasalida="",resultado="";
    fetch('../Controlador/MostrarProductos.php', {
        method: 'POST'
    })
   
    .then((res)=>res.json())

    .then((data)=>{
        console.log(data);
        datasalida=JSON.parse(JSON.stringify(data));
       
        let templista=[];
        const AuxPalabraFiltrada = datasalida.filter( datasalida => templista.push(datasalida.NOMBRE)
                                                     , resultado=datasalida                             );
        const palabraFiltrada = templista.filter(templista => templista.toLowerCase().includes(inputTexto));
        
        console.log("---"+resultado[0].PROD_PRECIO_VENTA);
        //ProductoSeleccionado=resultado[0];

        datasalida.forEach(element => {
         
            if (element.NOMBRE==palabraFiltrada) {
                ProductoSeleccionado=element;
                console.log("++"+element.NOMBRE)
            }
                
            
        });
        
        mostrarListadoCliente(palabraFiltrada,ProductoSeleccionado); 

        
    });
    return resultado;
}

function seleccionarListaProducto(){
    //console.log("selcciono producto lista");
    const filaProductoPrecio=document.getElementById("idfilaPrecio");
   // const filaProductoCantidad=document.getElementById("idfilaCantidad");

    if (ProductoSeleccionado.CANTIDAD!=0) {
        filaProductoPrecio.innerHTML=ProductoSeleccionado.PROD_PRECIO_VENTA+" $";

    
        let cantidamax=ProductoSeleccionado.CANTIDAD;
        
        const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');
        
        filaProductoPrincipal.classList.remove("d-none")

        const filaCantidadinput = document.getElementById('idfilaCantidadinput');
        filaCantidadinput.setAttribute("max",cantidamax);
    }
}




window.addEventListener("load", inicio, false);