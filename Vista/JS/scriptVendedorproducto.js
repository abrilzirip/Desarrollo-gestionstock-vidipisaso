function inicio() {
    document.getElementById("autocompletadoBuscarProducto").addEventListener("input", buscarProducto, false); 
    document.getElementById("listaProductos").addEventListener("click", seleccionarListaProducto, false);
    document.getElementById("id_modificar_cantidad_producto").addEventListener("click",e=>{ ActualizarProductoStock(e)},false);

}



let ProductoSeleccionado;
let DatosEnviados=[];

 



function buscarProducto() {

    const autocompletadoInput = document.getElementById("autocompletadoBuscarProducto");
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

function mostrarListadoProducto(palabraFiltrada,objetoProductoSeleccionado)  {

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
            li.textContent = obj.NOMBRE +" "+obj.MARCA+ " Cantidad "+obj.CANTIDAD;
            li.addEventListener('click', () => {
                autocompletadoInput.value = obj.NOMBRE +" "+obj.MARCA+ " Cantidad "+obj.CANTIDAD;
                listaCliente.innerHTML = '';
                ProductoSeleccionado=obj;
                DatosEnviados.push({id:obj.ID_PRODUCTO,nombre:obj.NOMBRE,marca:obj.MARCA,precio:obj.PROD_PRECIO_VENTA,
                cantidad:1});
            });
            listaCliente.appendChild(li);
        });
    }
}

function seleccionarListaProducto(){
    console.log("selcciono producto lista");
    let filaProductoPrecio=document.getElementById("idfilaPrecio");
    let filaProductoMarca=document.getElementById("idfilamarca");
    let filaProductoDescripcion=document.getElementById("idfiladecripcion");
    //idfiladecripcion  idfilamarca

    filaProductoPrecio.innerHTML=ProductoSeleccionado.PROD_PRECIO_VENTA;
    filaProductoMarca.innerHTML=ProductoSeleccionado.MARCA;
    filaProductoDescripcion.innerHTML=ProductoSeleccionado.NOMBRE;


    const filaProductoPrincipal = document.getElementById('idfilaProductoprincipal');

    filaProductoPrincipal.classList.remove("d-none")

    const filaCantidadinput = document.getElementById('idfilaCantidadinput');


}

function ActualizarProductoStock(e){
    e.preventDefault();
    console.log("comenzo la actualizacion");
    console.log("++"+DatosEnviados);
    document.getElementById("idinputdatosTxtstock").value=JSON.stringify(DatosEnviados);
    console.log("mando esto+"+document.getElementById("idinputdatosTxtstock").value);
    ActualizarProductoStockenBase();
}


function ActualizarProductoStockenBase(){
    


    let formaulrioEnvio=document.getElementById("idformilarioUpdateSotck");
    //datostxtstock


    fetch('../Controlador/ActualizarProductoStock.php', {
        method: 'POST',
        body: new FormData(formaulrioEnvio)
    })
  

    .then((data)=>{

        console.log("seconecto ala base"+data);

        swal("Actualizo Stock","","success");
        setTimeout(function(){
            window.location.reload();
        },4000);

    });
}


function TraerProductosdeDDBB(inputTexto){
    let datasalida="",resultado="";
    fetch('../Controlador/MostrarProductos.php', {
        method: 'POST'
    })
 
    .then((res)=>res.json())
    //.then((data)=>console.log(data));
    .then((data)=>{

        datasalida=JSON.parse(JSON.stringify(data));

        let templista=[];
        const AuxPalabraFiltrada = datasalida.filter( datasalida => templista.push(datasalida.NOMBRE)
                                                     , resultado=datasalida                             );
        const palabraFiltrada = templista.filter(templista => templista.toLowerCase().includes(inputTexto));
        //mostrarListadoProducto(palabraFiltrada); 


            //console.log(datasalida);
            let objetoArray=[];
            datasalida.forEach(element => {
               // console.log(element.NOMBRE);    
                if (palabraFiltrada.includes(element.NOMBRE)) {
                    //ProductoSeleccionado=element;
                    objetoArray.push(element);
                    //console.log("++"+element.NOMBRE)
                
                }
                  
                
            });
            
            mostrarListadoProducto(palabraFiltrada,objetoArray); 
 
    });
    return resultado;
}

window.addEventListener("load", inicio, false);


    
